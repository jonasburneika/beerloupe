<?php
session_start();
include_once 'config.php';
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (isset($_SESSION['currentPage']) && $_SESSION['currentPage'] !== $actual_link){
	$_SESSION['previosPage'] = $_SESSION['currentPage'];
	$_SESSION['currentPage'] = $actual_link;
} else {
	$_SESSION['currentPage'] = $actual_link;
}?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="icon" type="image/png" href="myicon.png">
		<style>
			
			html {
				min-height:100%;
				background:linear-gradient(0deg,rgba(255,87,34,0.6),rgba(255,87,34,0.6)),url(img/background.jpg);
				background-size:cover;
				background-attachment: fixed;
				background-position: center;
				background-repeat: no-repeat;
			}

			.centered {
				position: fixed;
				top: 50%;
				left: 50%;
				width: 100%;
				padding: 20px;
				/* bring your own prefixes */
				transform: translate(-50%, -50%);
				z-index:-3;
			}
			.jumbotron{
				background: none !important;
			}
			.bottom{
				position:fixed;
				width:100%;
				bottom:0px;
				background: #ff9800;
			}
		</style>
	</head>
	<body class = "jumbotron">
		<div class="container">
		<?php if (isset($_SESSION['username'])){ ?>
			<div class="d-flex flex-column flex-md-row align-items-center px-md-4 bg-white border-bottom box-shadow no-print"><a href="profile.php" target="_self"><?php echo $_SESSION['username'];?></a></div>	
		<?php } else {?>
			<div class="d-flex flex-column flex-md-row align-items-center px-md-4 bg-white border-bottom box-shadow no-print">
				<a href="login.php?registration" target="_self">Registracija</a>
			</div>	
		<?php }?>
        
		<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow no-print">
			<h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark text-uppercase" href="index.php">GetDrunk</a></h5>
			<nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark text-uppercase" href="places.php">Alaus vietos</a>
                <a class="p-2 text-dark text-uppercase" href="groups.php">Alaus grupės</a>
                <a class="p-2 text-dark text-uppercase" href="drinks.php">Mano alūs</a>
                <a class="p-2 text-dark text-uppercase" href="profile.php">Mano profilis</a>
			</nav>
			<?php if (isset($_SESSION['username'])){ ?> 
				<a class="btn btn-outline-primary" href="logout.php" target="_self"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Logout</a>
			<?php } else {?>
				<a class="btn btn-outline-success" href="login.php" target="_self"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Login</a>
			<?php } ?>
			

		</div>
		<?php if (!isset($_SESSION['username'])){ ?> 
				<img class="centered" src="img/logo.png">
		<?php } ?>



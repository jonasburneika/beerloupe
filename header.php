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
		<link rel="stylesheet" href="css/main.css"> 
        <link rel="icon" type="image/png" href="myicon.png">
	</head>
	<body class = "jumbotron">
		<div class="container">
		<?php if (!isset($_SESSION['username'])){ ?> 
				
		<?php } ?>



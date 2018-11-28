<?php
$title = "Index.php pradinis puslapis";
include 'header.php';?>


<?php if (!isset($_SESSION['username'])){ ?> 
    <?php include 'login.php'; ?>
<?php } else { ?>
    <img class="centered" src="img/logo.png">
<?php } ?>
<?php include 'footer.php'; ?>


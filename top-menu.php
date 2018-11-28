
<div class="col-12 clearfix p-0 d-sm-block d-md-none">
    <div class = "row topMenu m-0">
        <div class= "col-2">
            <?php if (isset($_SESSION['username'])){ ?> 
                <img src="img/add.png" class="img-fluid pt-3">
            <?php } ?>
        </div>
        <div class= "col-8">
            <a href="index.php" target="_self">
                <img src="img/logo.png" class="img-fluid">
            </a>
        </div>
        <div class= "col-2">
            <?php if (isset($_SESSION['username'])){ ?> 
                <img src="img/menu.png" class="img-fluid pt-3">
            <?php } ?>
        </div>
    </div>
</div>
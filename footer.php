

<?php if (isset($_SESSION['username'])){ ?> 
    <div class="bottom col-12 clearfix p-0 d-sm-block d-md-none">
        <div class = "row bottom clearfix">
  
                <div class= "col-3">
                   <a href="groups.php" target="_self">
                        <img src="img/group.png" class="img-fluid  p-3">
                     <!--   <p class="bottom-text">My Groups</p> -->
                    </a>
                </div>
                <div class= "col-3">
                <a href="" target="_self">
                    <img src="img/search.png" class="img-fluid p-3">
                   <!-- <p class="bottom-text">Search</p>     -->
                </a>
                </div>
                <div class= "col-3">
                <a href="drinks.php" target="_self">
                    <img src="img/beer.png" class="img-fluid p-3">
                   <!-- <p class="bottom-text">My Beers</p> -->
                </a>
                </div>
                <div class= "col-3">
                <a href="profile.php" target="_self">
                    <img src="img/group.png" class="img-fluid p-3">
                   <!-- <p class="bottom-text">My Profile</p> -->
                </a>
                </div>
        </div>
    </div>
<?php } ?>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" media="screen, projection">></script>
<?php include_once 'js/main.js';?>
</body>
<footer>
</footer>
</html>

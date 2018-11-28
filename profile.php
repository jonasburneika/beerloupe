<?php include 'header.php';?>

<?php if (isset($_POST['save'])){
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password1 = (isset($_POST['password1'])) ? $_POST['password1'] : '';
    $password2 = (isset($_POST['password2'])) ? $_POST['password2'] : '';


    if ($password1 === $password2){
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows == 1){
            $userData = $result->fetch_assoc();
            $userID = $userData['id'];
            $timestamp = date("Y-m-d H:i:s");
            $password = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '$password' WHERE id = $userID";
            if ($conn->query($sql) === FALSE) {
                echo "Error creating table: " . $conn->error. "<br>";
            } else {
                ?>
                <div class="alert alert-success">
                    <strong>CONGRATULATION!</strong> Your password was changed!
                </div>
                <?php
            }       
        }
    }
} ?>
<div class="container">
    <div id="crawls" class="container">
        <?php if (!isset($_SESSION['username'])){ include "assets/please_login.html";} else {?>
           <?php ?>
            <div>
                <div class="row">
                    <nav class="col-md-3 d-none d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                            <ul class="nav flex-column">
                                <li class="nav-item text-uppercase">
                                    <a class="nav-link" href="?customer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                   My Profile
                                    </a>
                                </li>
                                <li class="nav-item text-uppercase">
                                    <a class="nav-link" href="?beer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                    
                                    My beers
                                    </a>
                                </li>                        
                                <li class="nav-item text-uppercase">
                                    <a class="nav-link active" href="?places">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    My Places
                                    </a>
                                </li>
                                <li class="nav-item text-uppercase">
                                    <a class="nav-link" href="?groups">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                    My groups
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="col-md-9 d-none d-md-block bg-light sidebar">
                    
                    <?php if (isset($_GET['customer']) || count($_GET) == 0) {?>
                        <h3 class="text-primary text-uppercase" style="border-bottom: 2px solid;" >Profile</h3>
                        <div class="row">
                            <?php if (!isset($_POST['edit'])){?>
                                <div class="col-sm-4"><p class="text-secondary">Username: </p></div>  <div class="col-sm-8"><?php echo $_SESSION['username'];?></div>
                                <div class="col-sm-4"><p class="text-secondary">Creation date: </p></div>  <div class="col-sm-8"><?php echo $_SESSION['created'];?></div>
                                <div class="col-sm-4"><p class="text-secondary">UserID:</p></div>  <div class="col-sm-8"><?php echo $_SESSION['userid'];?></div>
                                <div class="col-sm-8"></div>
                                <form class="form-signin" method="POST" action="">
                                    <div class="col-sm-12"><button class="btn btn-sm btn-primary btn-block" type="submit" name="edit" value="edit">EDIT PROFILE</button></div>
                                </form>
                            <?php } else {?>
                                <form class="form-signin row" method="POST" action="">
                                    <div class="col-sm-4"><p class="text-secondary">UserID:</p></div>
                                    <div class="col-sm-8"><?php echo $_SESSION['userid'];?></div>
                                    <div class="col-sm-4"><p class="text-secondary">Username:</p></div>  
                                    <div class="col-sm-8"><input type="text" id="inputusername" name="username" placeholder="UserName" value = "<?php echo $_SESSION['username'];?>" required autofocus></div>
                                    <div class="col-sm-4"><p class="text-secondary">Email:</p></div>  
                                    <div class="col-sm-8"><input type="email" id="email" name="email" placeholder="Your Email" required value = "<?php echo $_SESSION['email']; ?>"></div>
                                    <div class="col-sm-4"><p class="text-secondary">Password:</p></div>  
                                    <div class="col-sm-8"><input type="password" id="inputpassword1" name="password1" placeholder="New password" required></div>
                                    <div class="col-sm-4"><p class="text-secondary">Repeat password:</p></div>  
                                    <div class="col-sm-8"><input type="password" id="inputpassword2" name="password2" placeholder="Repeat new password" required></div>
                                    <div class="col-sm-8"></div>                              
                                    <div class="col-sm-4"><button class="btn btn-sm btn-primary btn-block" type="submit" name="save" value="save">SAVE NEW DATA</button></div>
                                </form>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if (isset($_GET['beer'])) {?>
                        <h3 class="text-primary text-uppercase" style="border-bottom: 2px solid;" >My Beers</h3>
                        <div class="row">
                        <?php
                            $userID = $_SESSION['userid'];
                            $sql = "SELECT * FROM drinks WHERE user_id='$userID'";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()){
                                echo $row['place_id'] . ' ' .  $row['beer_id'] . ' ' . $row['time'] . '<br>';
                            }
                        ?>
                        </div>
                    <?php }?>
                    <?php if (isset($_GET['places'])) {?>
                        <h3 class="text-primary text-uppercase" style="border-bottom: 2px solid;" >My Places</h3>
                        <div class="row">
                        </div>
                    <?php }?>
                    <?php if (isset($_GET['groups'])) {?>
                        <h3 class="text-primary text-uppercase" style="border-bottom: 2px solid;" >My Groups</h3>
                        <div class="row">
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>


        <?php } ?>
</div>

<?php include 'footer.php'; ?>

<!-- EOF -->
<?php include_once 'config.php'; ?>
<?php include_once 'header.php'; ?>
    <?php if (isset($_POST['login'])){ ?>
        
        <?php   
            $userName = $_POST['username'];
            $passWord = $_POST['password1'];

            $sql = "SELECT * FROM users WHERE username = '$userName'";
            $result = $conn->query($sql);
        ?>
        <?php if ($result->num_rows > 0){ ?>
            <?php while($row = $result->fetch_assoc()) {?>
                <?php if (password_verify($passWord,$row['password'])){?>
                    <?php if (empty($_SESSION['username'])) {
                        $_SESSION['username'] = $userName;
                        $_SESSION['userid'] = $row['id'];
                        $_SESSION['created'] = $row['created'];
                        $_SESSION['email'] = $row['email'];
                        header('Location: index.php');
                    }?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>

    <?php if (isset($_POST['create'])){?>
        <?php 
            $userName  = $_POST['username'];
            $passWord1 = $_POST['passWord1'];
            $passWord2 = $_POST['passWord2'];
            $email = $_POST['email'];
        ?>
        <?php if ($passWord1 === $passWord2){?>
            <?php 
                $sql = "SELECT * FROM users WHERE username = '$username'";
                $result = $conn->query($sql);
            ?>
            <?php if ($result->num_rows > 0){ ?>
                <div class="alert alert-warning">
                    <strong>ERROR!</strong> This Username is taken. Pleace choose another Username.
                </div>
            <?php } else { ?>
                <?php
                    $timestamp = date("Y-m-d H:i:s");
                    $password = password_hash($passWord1, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users (username, password, created, email) VALUES ('$userName', '$password', '$timestamp', '$email')";
                    if ($conn->query($sql) === FALSE) {
                        echo "Error creating table: " . $conn->error. "<br>";
                    }
                ?>
            <?php } ?>
        <?php } else { ?>
            <div class="alert alert-warning">
                <strong>ERROR!</strong> Passwords do not match.
            </div>
        <?php } ?>
    <?php } ?>
    
    <?php if(!isset($_SESSION['username']) && !isset($_GET['registration'])){?>
    <div class="col-xs-12 col-lg-3 btm-p">
        <img class="centered" src="img/logo.png">
        <div class="col-12 col-lg-3 login clearfix">

                <form class="form-signin col-12 pl-2" method="POST" action="login.php">
                    <div class='row'>
                        <div class='col-xs-12 clearfix'>        
                            <div class='col-xs-8 float-left pr-0'>
                                <input type="text" id="inputusername" name="username" class="form-control" placeholder="UserName" required autofocus>
                                <input type="password" id="inputPassword" name="password1" class="form-control" placeholder="Password" required>
                            </div>
                            <div class='col-xs-4 float-right max-height pl-0'>
                                <button class="btn max-height main-color" type="submit" name="login" value="Login">Sign in</button>
                            </div>
                        </div>
                    </div>
                </form>
            
                <div class="row">
                    <div class="col-12 clearfix pl-0">
                            <div class="col-6 float-left pl-0"><h6><a href="login.php?registration" target="_self">REGISTER</a></h6></div>
                            <div class="col-6 float-right pl-0"><h6>FORGOT PASSWORD</h6></div>
                    </div>
                </div>
    
        </div>
    </div>
    <?php }?>


<?php if (isset($_GET['registration'])){?>

 <div class="col-xs-12 col-lg-3 btm-p">
        <form class="form-signin" method="POST" action="login.php">
            <h1 class="h3 mb-3 font-weight-normal">Join to us!!!</h1>
            <label for="inputusername" class="sr-only">User Name</label>
            <input type="text" id="inputusername" name="username" class="form-control mb-3" placeholder="UserName" required autofocus>
            <label for="inputPassword1" class="sr-only">Password</label>
            <input type="email" id="inputusername" name="email" class="form-control mb-3" placeholder="Your e-mail" required>
            <label for="inputPassword1" class="sr-only">Password</label>
            <input type="password" id="inputPassword1" name="passWord1" class="form-control mb-3" placeholder="Password" required>
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="password" id="inputPassword2" name="passWord2" class="form-control mb-3" placeholder="Please repeat password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="create" value="create">Registration</button>
        </form>
    </div>

<?php } ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce | Login</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <?php
        require "../back/dbconfig.php";
        if(isset($_POST['login'])) {

            $valide=true ;
            $username=$_POST['username'] ;
            $password=$_POST['password'];
      
            if(empty($username)){
                $erUsername="Write your username"  ;
                $valide=false ;
            }
      
            if(empty($password)){
                $erPassword="Write your password"  ;
                $valide=false ;
            }

            if($valide){
                $user = new authentication($db_config);
                if($user->login($username,$password)){
                    $user->redirect("product.php");
                }              
                else {
                    try {
                        $valideUsername=false ;
                        $validePass=false;
                        $req = $db_config->prepare("SELECT username FROM admin WHERE username=:umail  ");
                        $req->execute(array(':umail'=>$username));
                                  
                        $ligne=$req->fetch(PDO::FETCH_ASSOC);
                        if($ligne['username']==$username){
                            $valideUsername=true;
                        }
                        $req = $db_config->prepare("SELECT password FROM admin WHERE password=:upass ");
                        $req->execute(array(':upass'=>$password));
                        $ligne=$req->fetch(PDO::FETCH_ASSOC);
                        if(password_verify($password, $ligne['password'])) {
                            $validePass=true;
                        }
                        if(!$valideUsername){
                            $erUsername="The email entered does not match any account";
                        }
                        if(!$validePass){
                            $erPassword="The password entered does not match any account";
                        }         
                    }
                    catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }
           
        }
    ?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="login.php" method="post">
                            <div class="group-input">
                                <label for="username">Username or email address *</label>
                                <input type="text" id="username" name="username" autocomplete="off">
                                <?php
                                    if(isset($erUsername)){
                                        echo '<p>'.$erUsername.'</p>';
                                    }
                                ?>
                            </div>
                            <div class="group-input">
                                <label for="password">Password *</label>
                                <input type="password" id="password" name="password" autocomplete="off">
                                <?php
                                    if(isset($erPassword)){
                                        echo '<p>'.$erPassword.'</p>';
                                    }
                                ?>
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <input type="submit" class="site-btn login-btn" name="login" value="Sign In">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    <!-- Footer Section Begin -->
    <footer style="background: #191919;text-align:center;">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="float: center;font-size: 16px;color: #b2b2b2;">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
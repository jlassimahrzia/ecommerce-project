<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
   
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        #mapid { height: 610px; }
    </style>
    <?php
        require "../back/dbconfig.php";
        $admin = new authentication($db_config);
        $product = new product($db_config);
        $cat = new categorie($db_config)  ;
        require "../back/sendmail.php";
        $mail = new sendmail();
        if(isset($_POST['send'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $subject=$_POST['subject'];
            $message=$_POST['message'];
            $valide = true ;
            if(empty($name)){
                $erName="Please enter your name";
                $valide= false;
            }
            if(empty($email)){
                $eremail="Please enter your email";
                $valide= false;
            }
            if(empty($subject)){
                $ersubject="Please enter the subject";
                $valide= false;
            }
            if(empty($message)){
                $ermessage="Please enter your message";
                $valide= false;
            }
            if($valide){
                $mail->send($name,$email,$subject,$message);
            } 
        }
    ?>

</head>

<body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
          AOS.init();
        </script>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
   <!-- Header Section Begin -->
   <header class="header-section">
        <div class="header-top" data-aos="fade-up">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        hello.colorlib@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right ">
                    <a href="login.php" class="trn login-panel"><i class="fa fa-user"></i>Login</a>
                     <div class="lan-selector">
                        <a class="lang_selector trn" href="#" data-value="en" ><img src="images/uk.png" alt="" class="flag">EN</a>
                        <a class="lang_selector trn" href="#" data-value="fr" ><img src="images/france.png" alt="" class="flag">FR</a>                   
                     </div>
                                   
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item" data-aos="fade-up">
            <div class="container">
                <div class="nav-depart">
                <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span class="trn">All Categories</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="shop.php" class="trn">All Categories</a></li>
                            <?php
                                $cat = new categorie($db_config)  ;
                                $req = $cat->get_all_cat();
                                while ($ligne = $req->fetch()) {
                                    echo '<li><a href="shop.php?idcateg='.$ligne['id'].'">'.$ligne['nom'].'</a></li>';
                                }
                            ?> 
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="index.php"  class="trn">Home</a></li>
                        <li><a href="shop.php"  class="trn">Products</a></li>
                        <li  class="active"><a href="contact.php"  class="trn">Contact</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"  class="trn"><i class="fa fa-home"></i> Home</a>
                        <span  class="trn">Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Map Section Begin -->
    <div class="map spad" data-aos="fade-up">
        <div class="container">
            <div class="map-inner">
                <div id="mapid"></div>
            </div>
        </div>
    </div>
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad" >
        <div class="container">
            <div class="row">
                <div class="col-lg-5" data-aos="fade-up">
                    <div class="contact-title" data-aos="fade-up">
                        <h4  class="trn">Contact Us</h4>
                        <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, maki years old.</p>
                    </div>
                    <div class="contact-widget" data-aos="fade-up">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span  class="trn">Address :</span>
                                <p>60-49 Road 11378 New York</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span  class="trn">Phone :</span>
                                <p>+65 11.188.888</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>hellocolorlib@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1" data-aos="fade-up">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4 class="trn">Leave A Comment</h4>
                            <p class="trn">Our staff will call back later and answer your questions.</p>
                            <form name="form-contact" action="contact.php" method="post" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your name" name="name"  id="name" autocomplete="off"> 
                                        <?php
                                            if(isset($erName)){
                                                echo '<p>'.$erName.'</p>';
                                            }
                                        ?>                                      
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your email" name="email" id="email" autocomplete="off">
                                        <?php
                                            if(isset($eremail)){
                                                echo '<p>'.$eremail.'</p>';
                                            }
                                        ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" placeholder="Subject" name="subject" id="subject" autocomplete="off">
                                        <?php
                                            if(isset($ersubject)){
                                                echo '<p>'.$ersubject.'</p>';
                                            }
                                        ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Your message" name="message" id="message"></textarea>
                                        <?php
                                            if(isset($ermessage)){
                                                echo '<p>'.$ermessage.'</p> ';
                                            }
                                        ?>
                                        <br/>
                                        <button type="submit" class="site-btn trn" name="send">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
  <!-- Footer Section Begin -->
 <footer class="footer-section"  data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li class="trn">Address :</li>
                            <li> 60-49 Road 11378 New York</li>
                            <li class="trn">Phone :</li>
                            <li>+65 11.188.888</li>
                            <li>Email: </li>
                            <li>hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="index.php" class="trn">Home</a></li>
                            <li><a href="shop.php" class="trn">Products</a></li>
                            <li><a href="contact.php" class="trn">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Categories</h5>
                        <ul>
                            <?php
                                $cat = new categorie($db_config)  ;
                                $req = $cat->get_all_cat();
                                while ($ligne = $req->fetch()) {
                                    echo '<li><a href="shop.php?idcateg='.$ligne['id'].'">'.$ligne['nom'].'</a></li>';
                                }
                            ?> 
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5 class="trn">Contact Us</h5>
                        <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, maki years old.</p>
                        <a href="contact.php" class="primary-btn  trn">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="text-align:center;">
                        <div class="copyright-text" >
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
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.translate.js"></script>
    <script src="js/pagestranslate.js"></script> 
    <script src="js/main.js"></script>
     <!-- Form Validation JS File -->
     
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script src="js/form-validation.js"></script>
   <script>
    var mymap = L.map('mapid').setView([36.8132955, 10.0636667], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoiamxhc3NpbWFocnppYSIsImEiOiJjazdxdXBpa2swMGRiM2dzZnpqd29wNDgyIn0.DYLLXiEuh5N4zTb2ruTjaQ'
    }).addTo(mymap);
    var marker = L.marker([36.8132955, 10.0636667]).addTo(mymap);
    marker.bindPopup("ENSI COMPUS MANOUBA").openPopup();
   </script>
  
</body>

</html>
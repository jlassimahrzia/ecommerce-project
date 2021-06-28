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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <?php
        require "../back/dbconfig.php";
        $admin = new authentication($db_config);
        $product = new product($db_config);
        $cat = new categorie($db_config)  ;
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
                                    echo '<li><a href="shop.php?idcateg='.$ligne['id'].'&idsouscateg='.$ligne['id'].'">'.$ligne['nom'].'</a></li>';
                                }
                            ?> 
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="index.php"  class="trn">Home</a></li>
                        <li><a href="shop.php"  class="trn">Products</a></li>
                        <li><a href="contact.php"  class="trn">Contact</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    

    <!-- Hero Section Begin -->
    <section class="hero-section"  data-aos="fade-up">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="images/bg1.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span class="trn">Our Society</span>
                            <h1 class="trn">Dental </h1>
                            <p> description de la sociéte Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="contact.php" class="primary-btn trn">Contact Us</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Contact <span>Us</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="images/bg2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span class="trn">Dental product</span>
                            <h1 class="trn">Shop all our product</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p> 
                            <a href="shop.php" class="primary-btn trn">Click here</a>
                        </div>
                    </div>
                    <div class="off-card" class="trn">
                        <h2>teeth <span>Care</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="images/bg3.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span class="trn">Dental product</span>
                            <h1 class="trn">Various Product</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="shop.php" class="primary-btn trn">See more</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2 class="trn">Product <span> 100%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="images/about.jpg"  data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center">
                            
                </div>
                <div class="col-lg-6 text-center">
                    <div class="section-title"  data-aos="fade-up">
                        <h2 class="trn">ABOUT US</h2>
                        <div class="blog-details-inner">
                        <div class="blog-detail-desc"  data-aos="fade-up">
                                <p>psum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit
                                    
                                </p>
                            </div>
                            <div class="blog-quote">
                                 <p>“ Technology is nothing. What's important is that you have a faith in people, that
                                    they're basically good and smart.” <span>- Steve Jobs</span></p>
                            </div>
                        </div>
                    </div>
                
                    <a href="contact.php" class="primary-btn trn">Contact Us</a>
                </div>
            </div>  
        </div>
    </section>
    <!-- Deal Of The Week Section End -->
    <section class="latest-blog spad"  data-aos="fade-up">
    <div class="container">
        <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </section>
 
    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row"  data-aos="fade-up">
                <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="portfolio-menu text-center">
                            <button class="active trn" data-filter="*">All</button>
                            <?php
                                $cat = new categorie($db_config)  ;
                                $req = $cat->get_all_cat();
                                while ($ligne = $req->fetch()) {
                                    echo '<button data-filter=".'.$ligne['id'].'">'.$ligne['nom'].'</button>';
                                }
                            ?> 
                            </div>
                        </div>
                </div>
            <div class="row grid"  data-aos="fade-up">
                <?php
                   $cat = new categorie($db_config)  ;
                   $req = $cat->get_all_cat();
                   while ($ligne = $req->fetch()) 
                   {
                        echo '<div class="product-slider owl-carousel col-xl-12 grid-item '.$ligne['id'].'">';
                        $req1 = $db_config->prepare("SELECT * FROM produit WHERE id_categ=:uid  ");
                        $req1->execute(array(':uid'=>$ligne['id']));
                        while ($ligne1 = $req1->fetch()) 
                   {              
                        echo '<div class="product-item">
                            <div class="pi-pic">
                                <img src="../images/'.$ligne1['url_image'].'"alt=""  class="img">
                                <div class="sale  pp-sale">'.$ligne['nom'].'</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>                             
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">'.$ligne1['nom'].'</div>
                                <div class="product-price"><span>'.$ligne1['prix'].'DT</span></div>
                            </div>
                        </div>';
                    }
                    echo '</div>';
                   }
                ?>
            
            </div>
                   
            </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.translate.js"></script>
    <script src="js/pagestranslate.js"></script> 
    <script src="js/main.js"></script>
   <script>
 
   </script>
</body>

</html>
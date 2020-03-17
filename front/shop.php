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
    <link rel="stylesheet" href="css/jquery.paginate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#search-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#example .product-item").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    
    </script>
    <?php
        require "../back/dbconfig.php";
        $admin = new authentication($db_config);
        $product = new product($db_config);
        $cat = new categorie($db_config)  ;
    ?>
   
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
                        <li ><a href="index.php"  class="trn">Home</a></li>
                        <li class="active"><a href="shop.php"  class="trn">Products</a></li>
                        <li><a href="contact.php"  class="trn">Contact</a></li>
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
                        <a href="#" class="trn"><i class="fa fa-home"></i> Home</a>
                        <span  class="trn">Products</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
        <div class="container" data-aos="fade-up">
                <div class="inner-header">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9  col-md-9">
                            <div class="advanced-search">
                                <form action="#" class="input-group">
                                    <input id="search-input" type="text" placeholder="Search"  class="trn">
                                    <button type="button"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
    </header>
    <!-- Header End -->

   

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
       
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter" data-aos="fade-up">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                        <?php
                            $cat = new categorie($db_config)  ;
                            $req = $cat->get_all_cat();
                            while ($ligne = $req->fetch()) {
                                echo '<li><a>'.$ligne['nom'].'</a></li>';
                            }
                        ?> 
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7" data-aos="fade-up">
                                <div class="select-option">
                                    <select class="sorting" onchange="selectCategory(value);">
                                        <option value="all" ><a href="./product.php" class="trn">All Categories</a></option>                          
                                        <?php
                                            $cat = new categorie($db_config)  ;
                                            $req = $cat->get_all_cat();
                                            while ($ligne = $req->fetch()) {
                                                echo '<option value="'.$ligne['id'].'" ><a href="#">'.$ligne['nom'].'</a></option>';
                                            }
                                                
                                        ?> 
                                    </select>                               
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <?php
                                    if(isset($_GET['idcateg'])){
                                        $req = $db_config->prepare("SELECT * FROM produit WHERE id_categ=:uid  ");
                                        $req->execute(array(':uid'=>$_GET['idcateg']));                                          
                                    }
                                    else {
                                        $req = $db_config->prepare("SELECT * FROM produit ") ;
                                        $req->execute();
                                    }   
                                    $count = $req->rowCount();
                                    echo '<span class="trn">Show 01- 12 Of </span>'.$count.'<span class="trn"> Product</span>';
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="product-list" data-aos="fade-up">
                        <div class="row" id="example">
                            <?php
                             if(isset($_GET['idcateg'])){
                                $req = $db_config->prepare("SELECT * FROM produit WHERE id_categ=:uid  ");
                                $req->execute(array(':uid'=>$_GET['idcateg']));                                          
                            }
                            else {
                                $req = $product->get_all_product()  ;
                            }   
                            while ($ligne = $req->fetch()) 
                            {
                                echo'<div class="col-lg-4 col-sm-6">
                                    <div class="product-item" data-aos="fade-up">
                                        <div class="pi-pic">
                                            <img src="../images/'.$ligne['url_image'].'" alt="" class="img">';
                                $req2 = $db_config->prepare("SELECT nom, id FROM categorie WHERE id=:uid  ");
                                $req2->execute(array(':uid'=>$ligne['id_categ']));
                                //On récupère le résultat
                                $ligne2=$req2->fetch(PDO::FETCH_ASSOC);
                                            echo '<div class="sale pp-sale">'.$ligne2['nom'].'</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">
                                                <span>'.$ligne['nom'].'</span>
                                            </div>                                    
                                            <div class="product-price">
                                            <p>'.$ligne['description'].'</p>
                                            <div class="product-price"><span>'.$ligne['prix'].'DT</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

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
    <script src="js/main.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.paginate.js"></script>
    <script src="js/jquery.translate.js"></script>
    <script src="js/pagestranslate.js"></script> 
    <script>
    $('#example').paginate({

        // how many items per page
        perPage:                12,      

        // boolean: scroll to top of the container if a user clicks on a pagination link        
        autoScroll:             true,           

        // which elements to target
        scope:                  '',         

        // defines where the pagination will be displayed    
        paginatePosition:       ['bottom'],     

        // Pagination selectors
        containerTag:           'nav',
        paginationTag:          'ul',
        itemTag:                'li',
        linkTag:                'a',

        // Determines whether or not the plugin makes use of hash locations
        useHashLocation:        true,           

        // Triggered when a pagination link is clicked
        onPageClick:            function() {}   

    });
    // filtre By Category 
    function selectCategory(id) {
            window.location.href = "shop.php?idcateg="+id;
            if(id=="all")
                window.location.href = "shop.php";
    }

    
        $(document).ready(function(){
        $("#example").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#example div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    
    </script>
    
</body>

</html>
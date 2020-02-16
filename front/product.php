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
    <?php
        require "../back/dbconfig.php";
        $admin = new authentication($db_config);
        $product = new product($db_config);
        $cat = new categorie($db_config)  ;
        if(!$admin->is_loggedin()) {
            $admin->redirect('login.php');
        }
        if(!$admin->is_loggedin()) {
            $admin->redirect('login.php');
        }
        if(isset($_POST['add'])) {

            $valide=true ;

            $name=$_POST['name'] ;
            if(!empty($_POST['categorie'])){
                $categ=$_POST['categorie'];
            }         
            $description=$_POST['description'];
            $image=basename($_FILES["image"]["name"]);
            
            if(empty($name)){
                $erName="Write name of product"  ;
                $valide=false ;
            }
            if(!isset($categ)){
                $erCateg="Select categorie of product"  ;
                $valide=false ;
            }
            if(empty($description)){
                $erDescription="Write description of product"  ;
                $valide=false ;
            }
            if(empty($image)){
                $erImage="upload image of product"  ;
                $valide=false ;
            }
            
            if($product->test_img()!=null){
                $erImage=$product->test_img();
                $valide=false ;
            }

            
            if($valide){     
                $image=$product->upload_img();         
                if($image!=null){                  
                    if($product->add($name,$description,$categ,$image)){
                        //echo "sucess";
                    }
                }
            }
            

        }
        if(isset($_POST['add_categ'])) {
            $valide=true ;
            $name=$_POST['name_categ'] ;
            if(empty($name)){
                $erNameCateg="Write name of categorie"  ;
                $valide=false ;
            }
            if($valide){
                $cat->add($name);
            }
        }
    ?>
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        Products                     
                    </div>
                    <div class="phone-service">
                       
                    </div>
                </div>
                <div class="ht-right">
                    <a href="logout.php" class="login-panel"><i class="ti-lock"></i>LogOut</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <?php
                                $cat = new categorie($db_config)  ;
                                $req = $cat->get_all_cat();
                                while ($ligne = $req->fetch()) {
                                    echo '<option><a href="#">'.$ligne['nom'].'</a></option>';
                                }
                            ?> 
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Products By Categories</span>
                        <ul class="depart-hover">
                           
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./product.php">All Products</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div> --> 
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <form action="#" class="input-group">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <ul type="none" style="padding-top:1px">
                            <li class="heart-icon">                             
                                    <button type="submit" class="site-btn" data-toggle="modal"
                                     data-target=".bd-example-modal-lg" style="height:50px;">
                                        Add New Product</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modal_id"  
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="modal_id">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                        <div class="col-lg-10 offset-lg-1">
                                <div class="contact-form">
                                    <div class="leave-comment">                             
                                        <form action="product.php" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12 form-group" >
                                                    <input id="input_name" class="form-control" type="text" placeholder="Name" name="name" >
                                                    <p id="name" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erName)){
                                                            echo '<p>'.$erName.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <select id="input_cat" class="form-control"  name="categorie" >
                                                        <option value="" disabled selected hidden>Choose Categorie...</option>
                                                        <?php
                                                            $cat = new categorie($db_config)  ;
                                                            $req = $cat->get_all_cat();
                                                            while ($ligne = $req->fetch()) {
                                                                echo '<option value="'.$ligne['id'].'">'.$ligne['nom'].'</option>';
                                                            }
                                                        ?>
                                                    </select> 
                                                    <p id="cat" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erCateg)){
                                                            echo '<p>'.$erCateg.'</p>';
                                                        }
                                                    ?>                                     
                                                </div>
                                                <div class="col-lg-12 form-group" >
                                                    <textarea id="input_desc" class="form-control" placeholder="description" name="description" ></textarea>
                                                    <p id="desc" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erDescription)){
                                                            echo '<p>'.$erDescription.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="col-lg-12 input-group" >
                                                    <div class="custom-file">
                                                    <input id="input_img" type="file"  class="custom-file-input" id="image" name="image" required accept="image/png,image/jpg,image/jpeg">
                                                    <label class="custom-file-label" for="inputGroupFile04">Upload image</label>                                           
                                                    </div> 
                                                                                            
                                                </div>
                                                <p id="img" style="margin-bottom: 0px"></p>  
                                                <div class="col-lg-12">
                                                    <?php
                                                        if(isset($erImage)){
                                                            echo '<p>'.$erImage.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <br>
                                                    <button type="submit" class="site-btn" name="add" id="myBtn">Add Product</button>
                                                        
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <!-- <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="">Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="blog-section spad" style="padding-top:40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Add New Categorie</h4>
                            <form action="product.php" method="post">
                                <input type="text" placeholder="Name" name="name_categ" autocomplete="off">
                                <?php
                                    if(isset($erNameCateg)){
                                        echo '<p>'.$erNameCateg.'</p>';
                                    }
                                ?>                                
                                <button type="submit" name="add_categ" ><i class="ti-plus"></i></input>
                            </form>
                        </div>
                        <div class="blog-catagory">
                            <h4>Categories</h4>
                            <ul>
                            <?php                              
                                $req = $cat->get_all_cat();
                                echo'<table>';
                                while ($ligne = $req->fetch()) {
                                    echo'<tr> <td width="80%">'.$ligne['nom'].'</td>';
                                    echo'<td width="10%"><a href="update.php?id_prod='.$ligne['id'].'"><i class="ti-pencil-alt" style="color: #e7ab3c;">
                                    </i></a></td>';                               
                                    echo '<td width="1%"><a href="delete.php?id_categ='.$ligne['id'].'"><i class="ti-close" style="color: #e7ab3c;"></i></a></td></tr>';
                                }
                                echo'</table>';
                            ?> 
                            </ul>
                        </div>
                </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="cart-table table" id="example">
                        <table>
                            <thead>
                                <tr>
                                    <th style="text-align:left;padding-left:25px;">Image</th>
                                    <th style="text-align:left;">Product Name</th>
                                    <th style="text-align:left;">Categorie</th>
                                    <th class="p-name" style="text-align:left;">Description</th>                                  
                                    <th style="text-align:left;">Update</th>
                                    <th style="text-align:left;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                    <?php
                                        $req = $product->get_all_product()  ;
                                        while ($ligne = $req->fetch()) 
                                        {
                                            echo'<tr>';
                                            echo'<td class="cart-pic first-row"><img class="imgp" src="../images/'.$ligne['url_image'].'" alt=""></td>';
                                            echo'<td class="qua-col first-row"><h5  style="text-align:left">'.$ligne['nom'].'</h5></td>';
                                            echo'<td class="p-price first-row"><span>';
                                            $req2 = $db_config->prepare("SELECT nom FROM categorie WHERE id=:uid  ");
                                            $req2->execute(array(':uid'=>$ligne['id_categ']));
                                            //On récupère le résultat
                                            $ligne2=$req2->fetch(PDO::FETCH_ASSOC);
                                            echo $ligne2['nom'].'</span></td>';
                                            echo'<td class="cart-title first-row"><p>'.$ligne['description'].'</p></td>';
                                            echo'<td class="total-price first-row"><a  style="color: #e7ab3c;" class="action-btn" href="update.php?id_prod='.$ligne['id'].'"><i class="ti-pencil-alt" style="color: #e7ab3c;"></i> Update</a></td>';
                                            echo'<td class="total-price first-row"><a  style="color: #e7ab3c;" class="action-btn" href="delete.php?id_prod='.$ligne['id'].'"><i class="ti-close" style="color: #e7ab3c;"></i> Delete</a></td> ';
                                            echo'</tr>';
                                        }
                                    ?>                       
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

 

    <!-- Footer Section Begin -->
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
    <!-- 
        input front validation 
    -->
    <script>
    $(document).ready(function() {
    $('form').on('submit', function(e){
        let isvalid = true;
        let erreur = '';
        let input_nom = $("#input_name");
        let input_desc = $("#input_desc");
        let input_cat = $("#input_cat");
        let input_img = $("#input_img");
        console.log(input_img);
        if (input_nom.val().length  <= 1) {
            isvalid = false;
            $( "#name" ).text( "Write name of product" );
        }
        if (input_desc.val().length  <= 1 ){
            isvalid = false;
            $( "#desc" ).text( "Write description of product" );
        }  
        if (input_cat.val()  == undefined ) {
            isvalid = false; 
            $( "#cat" ).text( "select category of product" ); 
        } 
        if (!input_img.val().includes('.png') || !input_img.val().includes('.jpg') || !input_img.val().includes('.jpeg')) {
            isvalid = false;
            $( "#img" ).text( "upload image of product" ); 
        }  
        if (!isvalid) e.preventDefault();
        else $("#submit").unbind('click').click(); ; 
  });
});
    </script>
</body>

</html>
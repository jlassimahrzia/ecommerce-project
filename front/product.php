<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Products">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

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
    <!-- Backend Validation -->
    <?php
        require "../back/dbconfig.php";
        $admin = new authentication($db_config);
        $product = new product($db_config);
        $cat = new categorie($db_config)  ;
        if(!$admin->is_loggedin()) {
            $admin->redirect('login.php');
        }
        if(isset($_POST['add'])) {

            $valide=true ;

            $name=$_POST['name'] ;
            $price=$_POST['price'] ;
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
            if(empty($price)){
                $erPrice="enter price of product"  ;
                $valide=false ;
            }
            
            if($product->test_img()!=null){
                $erImage=$product->test_img();
                $valide=false ;
            }

            
            if($valide){     
                $image=$product->upload_img();         
                if($image!=null){                  
                    if($product->add($name,$description,$categ,$image,$price)){
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
        


        if(isset($_POST['update'])) {

            $valide=true ;
            $id = $_POST['id']; //product id
            $name=$_POST['name'] ;
            $price=$_POST['price'] ;
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
            if(empty($price)){
                $erPrice="Write description of product"  ;
                $valide=false ;
            }
            
            if($valide){     
                $image=$product->upload_img();         
                if($image!=null){   
                    // update with image               
                   $product->update($id, $name,$description,$categ,$price,$image);      
                }
                else {
                    // update without image
                    $product->update($id, $name,$description,$categ,$price);
            
                }
                
            }
        }
        if(isset($_POST['update_cat'])){
            $valide=true;
            $id=$_POST['id'];
            $name=$_POST['name'];
            if(empty($name)){
                $erNameCat="Write name of category";
                $valide=false;
            }
            if($valide){
                $cat->update($id,$name);
            }
        }
            
      
    ?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
                        <select class="language_drop" name="countries" id="countries" style="width:500px;" onchange="selectCategory(value);">                                  
                            <option>Categories</option>                             
                            <option value="all"><a href="./product.php">All Categories</a></option>                          
                            <?php
                                $cat = new categorie($db_config)  ;
                                $req = $cat->get_all_cat();
                               while ($ligne = $req->fetch()) {
                                    echo '<option value="'.$ligne['id'].'" ><a href="#">'.$ligne['nom'].'</a></option>';
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
     
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="#">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <form action="#" class="input-group">
                                <input id="search-input" type="text" onkeyup="search()" placeholder="Search">
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

    <!-- Add Product Modal   -->
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
                                        <form name="product" action="product.php" method="post" enctype="multipart/form-data">
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
                                                        <option value="" disabled selected hidden>Choose Category...</option>
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
                                                <div class="col-lg-12 form-group" >
                                                    <input id="input_price" class="form-control" type="text" placeholder="Price" name="price" >
                                                    <p id="price" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erPrice)){
                                                            echo '<p>'.$erPrice.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="col-lg-12 input-group" >
                                                    <div class="custom-file">
                                                    <input id="input_img" type="file"  class="custom-file-input" id="image" name="image" 
                                                    accept="image/x-png,image/jpg,image/jpeg">
                                                    <label class="custom-file-label" for="input_img">Upload image</label>                                           
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
                                                <div class="pt-3 col-lg-12 form-group">
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

    <!-- update Product modal --> 
    <div class="modal fade update-modal-lg" tabindex="-1" role="dialog" id="update_modal_id"  
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="update_modal_id">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                        <div class="col-lg-10 offset-lg-1">
                                <div class="contact-form">
                                    <div class="leave-comment">                             
                                        <form name="product-update" action="product.php" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12 form-group" >
                                                    <input id="update_input_name" class="form-control" type="text" placeholder="Name" name="name" >    
                                                    <input id="update_id" class="form-control" type="hidden" placeholder="Name" name="id" value="">
                                                    <p id="name" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erName)){
                                                            echo '<p>'.$erName.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <select id="update_input_cat" class="form-control"  name="categorie" >
                                                        <option value="" disabled selected hidden>Choose Category...</option>
                                                        <?php
                                                            $cat = new categorie($db_config)  ;
                                                            $req = $cat->get_all_cat();
                                                            while ($ligne = $req->fetch()) {
                                                                echo '<option value="'.$ligne['id'].'">'.$ligne['nom'].'</option>';
                                                            }
                                                        ?>
                                                    </select> 
                                                    <p id="update_cat" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erCateg)){
                                                            echo '<p>'.$erCateg.'</p>';
                                                        }
                                                    ?>                                     
                                                </div>
                                                <div class="col-lg-12 form-group" >
                                                    <input id="update_input_price" class="form-control" type="text" placeholder="Price" name="price" > 
                                                    <p id="name" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erPrice)){
                                                            echo '<p>'.$erPrice.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="col-lg-12 form-group" >
                                                    <textarea id="update_input_desc" class="form-control" placeholder="description" name="description" ></textarea>
                                                    <p id="update_desc" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erDescription)){
                                                            echo '<p>'.$erDescription.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="col-lg-12 form-group" >
                                                    <p class="mb-2">Actual Image</p>
                                                    <img style="max-width: 200px" id="old_img" src="" alt="">
                                                </div>
                                                <div class="col-lg-12 input-group" >
                                                    <div class="custom-file">
                                                    <input id="update_input_img" type="file"  class="custom-file-input" id="update_image" name="image" accept="image/x-png,image/jpg,image/jpeg">
                                                    <label class="custom-file-label" for="update_input_img">Change image</label>                                           
                                                    </div> 
                                                                                            
                                                </div>
                                                <p id="update_img" style="margin-bottom: 0px"></p>  
                                                <div class="col-lg-12">
                                                    <?php
                                                        if(isset($erImage)){
                                                            echo '<p>'.$erImage.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="pt-3 col-lg-12 form-group">
                                                    <br>
                                                    <button type="submit" class="site-btn" name="update" id="update_myBtn">Update Product</button>
                                                        
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
    <!-- update category modal -->
    <div class="modal fade update-category-modal-lg" tabindex="-1" role="dialog" id="update-category-modal-id"  
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="update-category-modal-id">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                        <div class="col-lg-10 offset-lg-1">
                                <div class="contact-form">
                                    <div class="leave-comment">                             
                                        <form name="upcat" action="product.php" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12 form-group" >
                                                    <input id="update_name" class="form-control" type="text" placeholder="Name" name="name" >    
                                                    <input id="up_cat_id" class="form-control" type="hidden" placeholder="Name" name="id" value="">
                                                    <p id="name" style="margin-bottom: 0px"></p>
                                                    <?php
                                                        if(isset($erNameCat)){
                                                            echo '<p>'.$erNameCat.'</p>';
                                                        }
                                                    ?> 
                                                </div>
                                                <div class="pt-3 col-lg-12 form-group">
                                                    <br>
                                                    <button type="submit" class="site-btn" name="update_cat" id="update_cat">Update Category</button>                                                      
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
    <!-- Section Begin -->
    <section class="blog-section spad" style="padding-top:40px;">
        <div class="container">
            <div class="row">
                <!-- Category Section -->
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Add New Category</h4>
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
                                echo'<table id="tablecat">';
                                while ($ligne = $req->fetch()) {
                                    echo'<tr> <td width="80%">'.$ligne['nom'].'</td>';
                                    echo '<td style="visibility:hidden;">'.$ligne['id'].'</td>';
                                    echo'<td width="10%"><a data-toggle="modal" data-target=".update-category-modal-lg" 
                                    class="color action-btn updateCateg href="#" ><i class="color ti-pencil-alt">
                                    </i></a></td>';                               
                                    echo '<td width="1%"><a data-toggle="tooltip" data-placement="top" title="Delete"
                                    class="color action-btn" href="javascript:;" onclick="deleteCat('.$ligne['id'].')"><i class="color ti-close"></i></a></td></tr>';
                                }
                                echo'</table>';
                            ?> 
                            </ul>
                        </div>
                </div>
                <!-- Product Section -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="cart-table table" id="example">
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th style="text-align:left;padding-left:25px;">Image</th>
                                    <th style="text-align:left;">Product Name</th>
                                    <th style="text-align:left;">Price</th>
                                    <th style="text-align:left;">Category</th>
                                    <th class="p-name" style="text-align:left;">Description</th>                                  
                                    <th style="text-align:left;">Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>                              
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
                                            echo'<tr>';
                                            echo'<td class="cart-pic first-row"><img data="'.$ligne['id'].'" class="imgp" src="../images/'.$ligne['url_image'].'" alt=""></td>';
                                            echo'<td class="qua-col first-row"><h5  style="text-align:left">'.$ligne['nom'].'</h5></td>';
                                            echo'<td class="p-price first-row"><span>'.$ligne['prix'].'</span></td>';
                                            echo'<td class="p-price first-row"><span';
                                            $req2 = $db_config->prepare("SELECT nom, id FROM categorie WHERE id=:uid  ");
                                            $req2->execute(array(':uid'=>$ligne['id_categ']));
                                            //On récupère le résultat
                                            $ligne2=$req2->fetch(PDO::FETCH_ASSOC);
                                            echo ' data="'.$ligne2['id'].'">' . $ligne2['nom'].'</span></td>';
                                            echo'<td class="cart-title first-row"><p>'.$ligne['description'].'</p></td>';
                                            echo'<td class="total-price first-row"><a data-toggle="modal" data-target=".update-modal-lg" 
                                            class="color action-btn updateBtn" href="#" 
                                            onclick="updateInputs('.$ligne['id'].')"><i class="ti-pencil-alt color"></i></a>';
                                            echo'&nbsp;&nbsp;&nbsp;<a data-toggle="tooltip" data-placement="top" title="Delete"
                                             class="color action-btn" href="javascript:;" onclick="deleteProduct('.$ligne['id'].')">
                                            <i class="ti-close color" ></i></a></td> ';
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
    <!-- Section End -->

    <!-- Footer Section Begin -->
    <footer style="background: #191919;text-align:center;">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="float: center;font-size: 16px;color: #b2b2b2;">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
 | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i>
 by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="js/jquery.simplePagination.js"></script>
    <!-- Form Validation JS File -->
    <script src="js/form-validation.js"></script>
    <script>
       $("#example").simplePagination({

            // the number of rows to show per page
            perPage: 5,

            // CSS classes to custom the pagination
            containerClass: '',
            previousButtonClass: 'page-btn ',
            nextButtonClass: 'page-btn ',

            // text for next and prev buttons
            previousButtonText: 'Previous',
            nextButtonText: 'Next',

            // initial page
            currentPage: 1

        });

        // Update product
  
        $(document).on('click','.updateBtn', function() {
            var rowIndex = $(this).closest('tr').get(0).rowIndex;
        
            // get data before update
            var row = $('#myTable tr').eq(rowIndex);

            var image = row.children(0).first().children('img').attr('src');
            var id_product = row.children(0).first().children('img').attr('data');
            var productname = row.children()[1].innerText;
            var price = row.children()[2].innerText;
            var categoryId = row.children()[3].childNodes[0].getAttribute('data');
            var description = row.children()[4].innerText;
        

            // select elements to update
            $("#update_input_name").val(productname);
            $("#update_input_cat").val(categoryId);
            $("#update_input_desc").val(description);
            $("#update_input_price").val(price);
            $("#old_img").attr('src', image);
            $("#update_id").val(id_product);
        });

        // Update Category
  
        $(document).on('click','.updateCateg', function() { 
            var name = $(this).parent().siblings(":first").text();
            var id = $(this).closest('tr').find('td:nth-child(2)').text();
            console.log(id);
            // select elements to update
            $("#update_name").val(name);
            $("#up_cat_id").val(id);
        });
    

        // delete product

        function deleteProduct(id) {
            //href="delete.php?id_prod='.$ligne['id'].'"
            console.log('hi')
            Swal.fire({
                title: 'Delete Product',
                text: "Are you sure? You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    ).then(r => {
                        window.location.href = './delete.php?id_prod=' + id
                    })
                }
            })
        }
        function deleteCat(id) {
            Swal.fire({
                title: 'Delete Category',
                text: "Are you sure? You won't be able to revert this! All the product of this category will be deleted",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {                   
                    Swal.fire(
                    'Deleted!',
                    'success'
                    ).then(r => {
                        window.location.href = './delete.php?id_categ=' + id
                    })
                }
            })
        }
        
       
            $('#input_img').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });
            
            $('#update_input_img').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

       $( "#target" ).click(function() {
            alert( "Handler for .click() called." );
        });
        // Search product 

        function search() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search-input");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // filtre By Category 
        function selectCategory(id) {
            window.location.href = "product.php?idcateg="+id;
            if(id=="all")
                window.location.href = "product.php";
        }
        
    </script>
</body>

</html>
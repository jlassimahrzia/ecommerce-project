<?php
    require "../back/dbconfig.php";
    $cat = new categorie($db_config);
    $product = new product($db_config);
    $admin = new authentication($db_config);
    $sous_cat = new souscategorie($db_config)  ;
    $id_categ=$_GET['id_categ'];
    $id_prod=$_GET['id_prod'];
    $id_subcateg=$_GET['id_subcateg'];
    if(isset($id_categ)){
        $cat->delete($id_categ);
    }
    if(isset($id_prod)){
        $product->delete($id_prod);
    }
    if(isset($id_subcateg)){
        $sous_cat->delete($id_subcateg);
    }
    $admin->redirect('product.php');
?>
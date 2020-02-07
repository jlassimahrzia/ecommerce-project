<?php
    require "../back/dbconfig.php";
    $cat = new categorie($db_config);
    $product = new product($db_config);
    $admin = new authentication($db_config);
    $id_categ=$_GET['id_categ'];
    $id_prod=$_GET['id_prod'];
    if(isset($id_categ)){
        $cat->delete($id_categ);
    }
    if(isset($id_prod)){
        $product->delete($id_prod);
    }
    $admin->redirect('product.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
        require "../back/dbconfig.php";
        $cat = new categorie($db_config)  ;
        /*if($cat->add("catégorie2")){
          echo "<br>"."added successfully" ;
        }
        if($cat->update(36,"cat2")){
            echo "<br>"."updated successfully" ;
        }
        if($cat->delete(34)){
            echo "<br>"."deleted successfully" ;
        } 
        echo "<br>".$cat->get_cat_by_id(33) ;*/
        $cat->get_all_cat() ;
        $product = new product($db_config);
        $product->get_all_product();
        $admin = new authentication($db_config);
        //$admin->register("jlassi","145987");
        /*if($admin->login("jlassi","145987")){
            $admin->redirect('home.php');
            echo "login successfully ";
        }*/
            
    ?>
    <h3>Upload File</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image" accept="image/png,image/jpg,image/jpeg"/>
        <input type="submit" value="Upload" name="upload">
    </form>
    <?php 
       if(isset($_POST["upload"])) {
           echo $product->add("p1","description",33);
       }
    ?>
    
</head>
<body>
    
</body>
</html>
  
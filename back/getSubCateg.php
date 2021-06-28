<?php
require "../back/dbconfig.php";
$sous_cat = new souscategorie($db_config)  ;

if($_POST['categ']) {
    $id = $_POST['categ']; //escape string
    
    // Run the Query
    $req = $db_config->prepare("SELECT * FROM souscategorie WHERE id_categorie=:uid");
    $req->execute(array(':uid'=>$id)); 
    while ($ligne = $req->fetch()) {
        echo '<option value="'.$ligne['id'].'">'.$ligne['name'].'</option>';
    }
}
?>
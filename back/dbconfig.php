<?php
	//On commence une session
	session_start();
	
	require "../back/categorie.php" ;
	require "../back/product.php" ;
	require "../back/authentication.php" ;
	
	//Les paramètres de connexion
	$DB_host = "localhost";
	$DB_user = "root";
	$DB_pass = "";
	$DB_name = "ecommerce";

	try {
		//ON crée une nouvelle connexion
		$db_config = new PDO("mysql:host={$DB_host};dbname={$DB_name};charset=UTF8",$DB_user,$DB_pass);
		
        //echo "connection succefully";
	} catch(PDOException $e) {
		echo $e->getMessage();
	}

?>

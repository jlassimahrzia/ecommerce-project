<?php
class souscategorie {

	private $db;

    function __construct($DB_con){
		$this->db = $DB_con;
	}
    
    public function add($nom,$idcat){  
        try
        {
            $sql = "INSERT INTO souscategorie (name ,id_categorie) VALUES (:nom , :idcat)";
            $req = $this->db->prepare($sql);
            $req->execute(array(":nom"=>$nom ,":idcat"=>$idcat));
            return true ;
        }          
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($id,$nom,$idcat){
        try
        {
            $sql ="UPDATE souscategorie SET name=:nom ,id_categorie=:idcat WHERE id=:id ";
            $req = $this->db->prepare($sql);
            $req->execute(array(":id"=>$id , ":nom"=>$nom,":idcat"=>$idcat));
            return true ;
        }          
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($id){
        try
        {
            $sql ="DELETE FROM produit WHERE id_sous_categ=:id";
            $req = $this->db->prepare($sql);
            $req->execute(array(":id"=>$id));
            $sql ="DELETE FROM souscategorie WHERE id=:id";
            $req = $this->db->prepare($sql);
            $req->execute(array(":id"=>$id));
            return true ;
        }          
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function get_all_cat(){
        $sql = 'SELECT * FROM souscategorie';
        $req = $this->db->query($sql);
        return $req ;
    }

    public function get_product_by_cat($id_cat){

    }

    public function get_cat_by_id($id){
        try
        {
            $req = $this->db->prepare("SELECT nom FROM souscategorie WHERE id=:id");
            $req->execute(array(":id"=>$id));
            $ligne=$req->fetch(PDO::FETCH_ASSOC); 
            return $ligne['nom'];      
        }          
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
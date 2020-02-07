<?php
class categorie {

	private $db;

    function __construct($DB_con){
		$this->db = $DB_con;
	}
    
    public function add($nom){  
        try
        {
            $sql = "INSERT INTO categorie (nom) VALUES (:nom)";
            $req = $this->db->prepare($sql);
            $req->execute(array(":nom"=>$nom));
            return true ;
        }          
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($id,$nom){
        try
        {
            $sql ="UPDATE categorie SET nom=:nom WHERE id=:id ";
            $req = $this->db->prepare($sql);
            $req->execute(array(":id"=>$id , ":nom"=>$nom));
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
            $sql ="DELETE FROM categorie WHERE id=:id";
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
        $sql = 'SELECT * FROM categorie';
        $req = $this->db->query($sql);
        return $req ;
    }

    public function get_product_by_cat($id_cat){

    }

    public function get_cat_by_id($id){
        try
        {
            $req = $this->db->prepare("SELECT nom FROM categorie WHERE id=:id");
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
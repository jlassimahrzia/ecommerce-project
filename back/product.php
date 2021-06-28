<?php
class product {

	private $db;

    function __construct($DB_con){
		  $this->db = $DB_con;
    }
    
    public function test_img(){
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["add"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check == false) {
                $erImage="File is not an image.";
                return $erImage ;
            }
        }
        // Check if file already exists
        /* if (file_exists($target_file)) {
            $erImage="Sorry, file already exists.";
            return $erImage;
        } */
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $erImage="Sorry, your file is too large.";
            return $erImage;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $erImage="Sorry, only JPG, JPEG & PNG  files are allowed.";
            return $erImage ;
        }
    }
    // if everything is ok, try to upload file
    public function upload_img(){
        $target_dir = "../images/";
        $filename   = uniqid() . "_" . time(); 
        $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION );
        $basename   = $filename . '.' . $extension;
        $target_file = $target_dir .$basename;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //$erImage="The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            return  $basename ;
        }
        else{
            return null ;
        }
    }
    
    public function add($nom,$desc,$idc,$idsubcat,$img,$prix){  
        try
        {
            $product = new product($this->db);
            if(!empty($img)){
                $sql = "INSERT INTO produit(nom,description,url_image,prix,id_categ,id_sous_categ) VALUES 
                (:nom , :description , :url_image , :prix , :id_categ , :idsubcat)";
                $req = $this->db->prepare($sql);
                $req->execute(array(":nom"=>$nom, ":description"=>$desc , ":url_image"=>$img , ":prix"=>$prix 
                , ":id_categ"=>$idc , ":idsubcat"=>$idsubcat ));
            }
            return true ;
        }          
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($id,$nom,$desc,$idc,$idsubcat,$prix,$image = NULL){
        try
        {
            if (isset($image)){
                $sql ="UPDATE produit SET nom=:nom , description=:description , id_categ=:id_categ , id_sous_categ=:id_subcateg, url_image=:image , prix=:prix
                WHERE id=:id ";
                $req = $this->db->prepare($sql);
                $req->execute(array(":id"=>$id , ":nom"=>$nom , ":description"=>$desc , ":prix"=>$prix ,":id_categ"=>$idc,":id_subcateg"=>$idsubcat, ":image" => $image));
                return true ;
            }
            else {
                $sql ="UPDATE produit SET nom=:nom , description=:description , id_categ=:id_categ , id_sous_categ=:id_subcateg, prix=:prix
                WHERE id=:id ";
                $req = $this->db->prepare($sql);
                $req->execute(array(":id"=>$id , ":nom"=>$nom , ":description"=>$desc , ":prix"=>$prix , ":id_categ"=>$idc,":id_subcateg"=>$idsubcat));
                return true ;
            }
           
        }          
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($id){
        try
        {
            $sql ="DELETE FROM produit WHERE id=:id";
            $req = $this->db->prepare($sql);
            $req->execute(array(":id"=>$id));
            return true ;
        }          
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function get_all_product(){
        $sql = 'SELECT * FROM produit';
        $req = $this->db->query($sql);
        return $req ;
    }

    public function get_prod_by_id(){

    }
}
?>
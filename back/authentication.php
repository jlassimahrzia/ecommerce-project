<?php
class authentication{
    
	private $db;

    function __construct($DB_con){
		  $this->db = $DB_con;
    }

    public function register($username,$pass){
        try
        {
            $hash_password = password_hash($pass, PASSWORD_DEFAULT);
            $req = $this->db->prepare("INSERT INTO admin(username,password) VALUES(:username, :pass)");
            $req->execute(array(':username'=>$username , ':pass'=>$hash_password));
            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function login($username,$pass){
        try
        {
            $req = $this->db->prepare("SELECT * FROM admin WHERE  username=:username LIMIT 1");
            $req->execute(array(':username'=>$username));
            $ligne=$req->fetch(PDO::FETCH_ASSOC);

            if($req->rowCount() > 0)
            {
                if(password_verify($pass, $ligne['password']))
                {
                    $_SESSION['user_session'] = $ligne['id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    public function redirect($url) {
        header("Location: $url");
    }

    public function is_loggedin() {
        if(isset($_SESSION['user_session'])) {
                return true;
        }
    }
    
    public function logout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}
?>
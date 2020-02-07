<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php 
        require "../back/dbconfig.php";
        $admin = new authentication($db_config);
        /*if(!$admin->is_loggedin()) {
            $admin->redirect('test.php');
        }
        else{
            echo "login successfully";
        }
        /*if($admin->logout()){
            $admin->redirect('test.php');
        }*/
    ?>
</head>
<body>
    <h1>WELCOM HOME</h1>
</body>
</html>
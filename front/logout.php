<?php
    require "../back/dbconfig.php";
    $admin = new authentication($db_config);
    $admin->logout();
    $admin->redirect('login.php');
?>
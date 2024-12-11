<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
        exit();
    }
    else{
        $_SESSION = array();
        session_destroy();
        setcookie('PHPSESSID', '', time() -3600);
        header("Location: index.php");
        exit();
    }
?>
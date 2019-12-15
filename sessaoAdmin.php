<?php
session_start();

if(!isset($_SESSION['loginNivel']) || ($_SESSION['loginNivel'] != 0) ) {   
    
    header("Location: http://" . $_SERVER['HTTP_HOST']);
    exit;
}

?>


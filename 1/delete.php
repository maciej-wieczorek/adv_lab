<?php 
    require_once "functions.php";
    
    delete_employee($_GET['id']);

    header('Location: index.php');
?>
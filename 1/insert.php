<?php 
    require_once "functions.php";

    if (isset($_POST['name']) &&
        isset($_POST['salary']) &&
        isset($_POST['occupation']) &&
        isset($_POST['hireDate']) &&
        !empty($_POST['name']) &&
        !empty($_POST['salary']) &&
        !empty($_POST['occupation']) &&
        !empty($_POST['hireDate']) &&
        is_numeric($_POST['salary'])) {

        insert_data($_POST['name'], $_POST['salary'], $_POST['occupation'], $_POST['hireDate']);
    }
    header('Location: index.php');
?>
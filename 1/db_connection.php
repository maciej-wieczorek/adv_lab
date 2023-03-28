<?php
    $address = "localhost";
    $user = "root";
    $password = "";
    $db_name = "university";

    $conn = mysqli_connect($address, $user, $password, $db_name);
    if (!$conn) {
        die("Connection error" .mysqli_connect_error());
    }
?>
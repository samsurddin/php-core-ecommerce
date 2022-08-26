<?php 
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $name = "bismilla";

    $conn = new mysqli($hostname,$user,$password,$name);

    if($conn){
        // die(mysqli_error($conn));
    }

?>
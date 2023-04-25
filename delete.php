<?php

    if(isset($_GET['deleteid'])){

        $id = $_GET['deleteid'];

        // establish connection again
        $conn = new mysqli('localhost', 'root', 'root' ,'books');
        $sql = "DELETE from book where id=$id";  
        

        if(mysqli_query($conn, $sql)){
            header( "location:index.php");
        } else {
            die(mysqli_error($conn));
        }
    }

?>
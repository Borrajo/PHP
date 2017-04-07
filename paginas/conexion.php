<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "peliculas_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        mysqli_query($conn,"SET NAMES 'utf8'");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
?>
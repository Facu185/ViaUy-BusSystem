<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pe3_urunet";

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) 
    {
        echo "Error de conexión: " . $e->getMessage();
    }
?>
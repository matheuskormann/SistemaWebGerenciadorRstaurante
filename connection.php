<?php
    $servername = "localhost";
    $username = "root"; // PUC => root
    $password = "PUC#1234";
    $dbname = "frontend";

    $conn = new mysqli($servername, $username, $password, $dbname,3308);
    if ($conn->connect_error) {
        die("Conexão falhou: ${$conn->connect_error}");
    }
    // echo "Conexão Ok";
?>  
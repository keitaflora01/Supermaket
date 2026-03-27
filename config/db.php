<?php
    $servername = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "Supermarket";

    $conn = new mysqli($servername, $username, $passwd, $dbname);

    if($conn->connect_error){
        die("Echec de la connexion : ".$conn->connect_error);
    }

    $conn->set_charset("utf8");

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<?php
    $host = "192.168.99.100:32595";
    $username = "root";
    $password = "root";
    $db = "gestion_produits";

    $link = mysqli_connect($host,$username,$password,$db) or die ("Erreur de connexion à la base de données.");
    mysqli_set_charset($link,"utf8");
?>
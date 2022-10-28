<?php

include 'database.php';

// Creation de la table
try {
    $crTable = "CREATE DATABASE pdobdd";
    $result = $bdd->exec($crTable);
    $sql="create database pdobdd";
        $conn->exec($sql);
        echo"Database crée";
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
}
$conn=null;
?>

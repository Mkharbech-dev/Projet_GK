<?php
//connexion
require('database.php');
// Creation de la table
$crTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(60)NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    UNIQUE (`email`)
)";
$result = $bdd->exec($crTable);
    
if ($result) {
        echo "creation table is rejeted";
    } else{
        echo "creation table is successful";  
}

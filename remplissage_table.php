<?php
//connexion
require('database.php');

try {
    // Premiere methode pour inserer
    // $insert = $bdd->prepare("INSERT INTO myguests(firstname, lastname, email) VALUES (?, ?, ?)");
    // $insert->execute(array('salah', 'mkharbech', 'salah@gmail.fr'));
    // $insert->execute(array('malak', 'mkharbech', 'malak@gmail.fr'));
    // $insert->execute(array('imane', 'mkharbech', 'imane@gmail.fr'));
    
    // Deuxième methode pour inserer
    $insert = $bdd->prepare("INSERT INTO myguests(firstname, lastname, email) VALUES (:x, :y, :z)");
    $insert->execute(array(':x'=>'salah',':y'=> 'mkharbech',':z'=> 'salah@gmail.fr'));
    $insert->execute(array(':x'=>'malak',':y'=> 'mkharbech',':z'=> 'malak@gmail.fr'));
    $insert->execute(array(':x'=>'imane',':y'=> 'mkharbech',':z'=> 'imane@gmail.fr'));

    echo "novelle insertion reussite";
} catch (PDOException  $th) {
    echo "insertion echouée".$th->getMessage();
}


   

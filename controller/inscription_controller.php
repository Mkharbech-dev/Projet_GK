<?php
//connexion
include './database.php';
if(isset($_POST['validate'])){
    if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['login']) AND !empty($_POST['password'])){
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_email = htmlspecialchars($_POST['login']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $dateInscription = date("Y-m-d H:i:s");
        $verifUser = $bdd->prepare('SELECT email FROM users WHERE email = ?');
        $verifUser->execute(array($user_email));
        if($verifUser->rowCount() == 0){
            // Inserer notre utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (firstname, lastname, email, mdp, role, date)VALUES (?, ?, ?, ?, ?, ?)');
            // Executer la requete.
            $insertUserOnWebsite->execute(array($user_lastname, $user_firstname,$user_email, $user_password, 'role_client', $dateInscription));
            // Récuperer les infos de l'utilisateur.
            $getInfosThisUserReq = $bdd->prepare('SELECT id, firstname, lastname, email, role FROM users WHERE firstname=? AND lastname=? AND email=? AND role=? AND date=?');
            $getInfosThisUserReq->execute(array($user_firstname, $user_lastname,  $user_email, 'role_client',$dateInscription));
            // Récuperer les infos de user et les stocker dans cette variable $usersInfos.
            $usersInfos = $getInfosThisUserReq->fetchAll();
            $successMessage = 'Enregistré avec succès, <a href= "connexion.php"> connectez‐vous </a> !';
            
        }else{
            $errorMsg = "email  existe déja!";
        }
    }else{
        $errorMsg = "Veuillez compléter tous les champs svp!";
    }
}

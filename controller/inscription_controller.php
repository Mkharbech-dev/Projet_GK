<?php
//connexion
include './database.php';

// Validation du formulaire.
if(isset($_POST['validate'])){
    // Vérifier si l'user a bien complété tous les champs.
    if(!empty($_POST['user_name']) AND !empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
        // Récuperer les données de user en hashant notre password
        $user_name = htmlspecialchars($_POST['user_name']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // Récuperer les user_name et l'email dans la table qui possede les meme en question.
        $verifUser = $bdd->prepare('SELECT user_name FROM users WHERE user_name = ? OR email = ?');
        // Executer la requete en passant le user_name et l'email dans un tableau
        $verifUser->execute(array($user_name, $user_email));
        // On verifie si l'utilisateur existe déja sur le site
        if($verifUser->rowCount() == 0){
            // Inserer notre utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (user_name, firstname, lastname, email, mdp)VALUES (?, ?, ?, ?, ?)');
            // Executer la requete.
            $insertUserOnWebsite->execute(array($user_name, $user_lastname, $user_firstname,$user_email, $user_password));
            // Récuperer les infos de l'utilisateur.
            $getInfosThisUserReq = $bdd->prepare('SELECT id, user_name, firstname, lastname, email FROM users WHERE firstname=? AND lastname=? AND user_name=? AND email=?');
            // Executer la requete
            $getInfosThisUserReq->execute(array($user_name, $user_firstname, $user_lastname,  $user_email));
            // Récuperer les infos de user et les stocker dans cette variable $usersInfos.
            $usersInfos = $getInfosThisUserReq->fetchAll();
          
            // message de success 
            $successMessage = 'Enregistré avec succès, <a href= "connexion.php"> connectez‐vous </a> !';
            
        }else{
            $errorMsg = "Nom d'utilisateur ou email  existe déja!";
        }
    }else{
        $errorMsg = "Veuillez compléter tous les champs svp!";
    }
}

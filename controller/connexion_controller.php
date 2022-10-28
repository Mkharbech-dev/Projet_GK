<?php
//connexion
include './database.php';

// Validation du formulaire.
if(isset($_POST['validate'])){
    // Vérifier si l'user a bien complété tous les champs.
    if(!empty($_POST['user_name']) AND !empty($_POST['password'])){
        // Récuperer les données des champs
        $user_name = htmlspecialchars($_POST['user_name']);
        $user_password = htmlspecialchars($_POST['password']);
        // Récuperer tous les données de la table users qui possede le pseudo en question
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE user_name = ?');
        $checkIfUserExists->execute(array($user_name));
        //Vérivier si l'utilisateur existe?
        if($checkIfUserExists->rowCount() > 0){
            
            //On stoke les infod de user dans un tableau
            $user_infos = $checkIfUserExists->fetch();

            //On vérifie si le mot de passe est correcte.
            if(password_verify($user_password, $user_infos['mdp'])){
             // si notre user est authentifié sur le site, je récupére ses infos dans des variables de session.
             $_SESSION['auth'] = true;
             $_SESSION['id'] = $user_infos['id'];
             $_SESSION['lastname'] = $user_infos['lastname'];
             $_SESSION['firstname'] = $user_infos['firstname'];
             $_SESSION['user_name'] = $user_infos['user_name'];
             // Redirection vers le fichier index php en cas de connexion (Page d'accueil)
             header('Location: Accueil.php');
            }else{
                $errorMsg = "Votre mot de passe est incorrect...!";
            }
        }else{
            $errorMsg = "Votre nom d'utilisation est incorrect...!";
        }
        
       
    }else{
        $errorMsg = "Veuillez copmléter tous les champs...!";
    }
}
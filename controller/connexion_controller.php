<?php
//connexion
include './database.php';

// Validation du formulaire.
if(isset($_POST['validate'])){
    if(!empty($_POST['login']) AND !empty($_POST['password'])){
        $email = htmlspecialchars($_POST['login']);
        $user_password = htmlspecialchars($_POST['password']);
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $checkIfUserExists->execute(array($email));
        if($checkIfUserExists->rowCount() > 0){            
            $user_infos = $checkIfUserExists->fetch();
            if(password_verify($user_password, $user_infos['mdp'])){
            if($user_infos['role']=='role_admin'){
            // si notre user est authentifié sur le site, je récupére ses infos dans des variables de session.
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user_infos['id'];
            $_SESSION['lastname'] = $user_infos['lastname'];
            $_SESSION['firstname'] = $user_infos['firstname'];
            $_SESSION['email'] = $user_infos['login'];
            $_SESSION['role'] = $user_infos['role'];
            // Redirection vers le fichier index php en cas de connexion (Page d'accueil)
            header('Location: ./admin/admin_user.php');  
            }else{
             // si notre user est authentifié sur le site, je récupére ses infos dans des variables de session.
             $_SESSION['auth'] = true;
             $_SESSION['id'] = $user_infos['id'];
             $_SESSION['lastname'] = $user_infos['lastname'];
             $_SESSION['firstname'] = $user_infos['firstname'];
             $_SESSION['email'] = $user_infos['login'];
             $_SESSION['role'] = $user_infos['role'];
             // Redirection vers le fichier index php en cas de connexion (Page d'accueil)
             header('Location: Accueil.php');
            }

            }else{
                $errorMsg = "Votre mot de passe est incorrect...!";
            }
        }else{
            $errorMsg = "Votre email est incorrect...!";
        }
        
       
    }else{
        $errorMsg = "Veuillez copmléter tous les champs...!";
    }
}
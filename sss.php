<?php
// Récuperer les infos de l'utilisateur.
$getInfosThisUserReq = $bdd->prepare('SELECT id, user_name, firstname, lastname, email FROM users WHERE firstname=? AND lastname=? AND user_name=? AND email=?');
// Executer la requete
$getInfosThisUserReq->execute(array($user_name, $user_firstname, $user_lastname,  $user_email));
// Récuperer les infos de user et les stocker dans cette variable $usersInfos.
$usersInfos = $getInfosThisUserReq->fetchAll();
// si notre user est authentifié sur le site, je récupére ses infos dans des variables de session.
$_SESSION['auth'] = true;
$_SESSION['id'] = $user_infos['id'];
$_SESSION['lastname'] = $user_infos['lastname'];
$_SESSION['firstname'] = $user_infos['firstname'];
$_SESSION['email'] = $user_infos['email'];
$_SESSION['user_name'] = $user_infos['user_name'];
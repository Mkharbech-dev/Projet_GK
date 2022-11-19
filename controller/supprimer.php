<?php
    //connexion
    include '../database.php';
    $res = $_GET['id'];
    $sql = $bdd->prepare( "delete from users where id= $res");
    $sql->execute();
    header('Location: ../admin/admin_user.php');  
?>

<?php
//connexion
include '../database.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../inc/head.php' ?>
<body>
<?php
$id_Get = $_GET['id'];

//echo $res;
$nom="";
$prenom = "";
$email="";



$sql = $bdd->prepare( "select * from users where id= $id_Get");
$sql->execute();
$res = $sql->fetchAll();

foreach ($res as $row) {
    $id= $row['id'];
    $firstname=$row["firstname"] ;
    $lastname=$row["lastname"] ;
    $email = $row["email"];
}
?>
<h3 class ='mt-2'  align="center">Formulaire de mise à jour d'un message</h3>
<div style="margin: 20px;" name="postMessage" class="col-8 my_color2 px-5 py-2 mx-auto text-white">
    
    <form action="miseAjour.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>"/>

        <div class="mb-3">
            <label class="form-label text-dark" for="nom">Prenom</label>
            <input type="text" value="<?php echo $firstname;?>" class="form-control" name="firstname" id="nom" placeholder="Enter nom">
        </div>

        <div class="mb-3" >
            <label for="nom" class="form-label text-dark">Nom</label>
            <input type="text" value="<?php echo $lastname;?>" class="form-control" name="lastname" id="nom" placeholder="Enter nom">
        </div>

        <div class="mb-3" >
            <label for="email" class="form-label text-dark">Email</label>
            <input type="email" value="<?php echo $email;?>" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>

        <input type="submit" onclick="" class="btn btn-primary mt-3" value="Modifier">
    </form>

 
    
    <div>
    </body>
</html>
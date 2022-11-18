<?php
//connexion
include '../database.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../inc/head.php' ?>
<body>


<?php
if(!empty($_SESSION['role'])){
$sql = $bdd->prepare( 'SELECT * FROM users');
$sql->execute();
$res = $sql->fetchAll();

if ($sql->rowCount() > 0) { 
?>
    <?php include '../inc/nav.php' ?>
   <div class="container mt-5">
    <h2>Ensemble des utilisateurs</h2>
    <center class="my-5">
    <a class="btn btn-success" href="../inscription.php"><p class="mb-0">Ajouter un utilisateur</p></a>
    </center>
   <table border=1px class="table table-hover"> 
   <tr class='text-center bg-dark text-white'>
   <th>ID</th>
   <th>nom</th>
   <th>prenom</th>
   <th>email</th>
   <th></th>
   <th></th>
   
   </tr>

   <?php
  foreach ($res as $row) {
    echo "<tr class='text-center'>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["firstname"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td><button class='btn btn-warning'><a class= 'text-white text-decoration-none' href='../controller/FormModifier.php?id=".$row['id']." &firstname=".$row['firstname']." &mail=".$row['email']."'> Modifier </a></button></td>";
    echo "<td><button class='btn btn-danger'><a class= 'text-white text-decoration-none' href='../controller/supprimer.php?id=".$row['id']." &firstname=".$row['firstname']." &mail=".$row['email']."' >Supprimer</a></button</td>";
}
?>
  </table>
  </div>
  </div>
<?php
} else {
  echo "<div class='text-center alert alert-secondary'> il n y\'a aucun utilisateur dans la BDD </div>";
}
}else if(empty($_SESSION['role'])){
  // Redirection vers le fichier index php en cas de connexion (Page d'accueil)
  header('Location: ../connexion.php');
}
?>
</body>
</html>
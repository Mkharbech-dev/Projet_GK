<?php
//connexion
include '../database.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../inc/head.php' ?>
<body>


<?php
$sql = $bdd->prepare( 'SELECT * FROM users');
$sql->execute();
$res = $sql->fetchAll();

if ($sql->rowCount() > 0) { 
?>
   <div class="container mt-5">
    <h2>Ensemble des utilisateurs</h2>
   <table border=1px class="table table-dark table-striped"> 
   <tr>
   <th>ID</th>
   <th>nom utilisateur</th>
   <th>nom</th>
   <th>prenom</th>
   <th>email</th>
   <th></th>
   <th></th>
   
   </tr>

   <?php
  foreach ($res as $row) {
    echo "<tr class="."'text-white'>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["user_name"] . "</td>";
    echo "<td>" . $row["firstname"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td><button class='btn btn-outline-secondary'><a class= 'text-white text-decoration-none' href='../controller/modifier.php?id=".$row['id']." &firstname=".$row['firstname']." &mail=".$row['email']."'> Modifier </a></button></td>";
    echo "<td><button class='btn btn-outline-secondary'><a class= 'text-white text-decoration-none' href='../controller/supprimer.php?id=".$row['id']." &firstname=".$row['firstname']." &mail=".$row['email']."' >Supprimer</a></button</td>";
}
?>
  </table>
  </div>
  </div>
<?php
} else {
  echo "<div class='text-center alert alert-secondary'> il n y\'a aucun utilisateur dans la BDD </div>";
}
?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>
<body>

<div class="">
<?php
include './inc/nav.php';
require_once ('database.php');
?>

</div>
<?php
$sql = $bdd->prepare( 'SELECT * FROM produit');
$sql->execute();
$res = $sql->fetchAll();
?>

<div class="container marketing my-5 ">
<div class="d-flex">
<?php
if ($sql->rowCount() > 0) {
foreach($res as $row) { ?>
        <div class="text-center col-4">
        <img src="<?php echo  $row["image"]?>" with="200px" height="200px" alt="image">
        <h5 class="fw-normal"><?php $row['libelle'] ?></h5>
        <p><?php echo $row["description"] ?></p>
        <p><?php echo $row["prix"] ?></p>
        <p><a class="btn btn-secondary" href="#">plus details &raquo;</a></p>
        </div> 
    <?php
}
?>
</div>
</div>
<?php
} else {
  echo "<div class='text-center alert alert-secondary'> il n y\'a aucun utilisateur dans la BDD </div>";
}
?>

</body>
</html>
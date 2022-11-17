<?php require './controller/inscription_controller.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>
<body>
    <h1 class="text-center mt-5">Inscription</h1>
    <br><br>
    <form class="container" method = "POST">
        <!-- afficher le message d'erreur  -->
        <?php if(isset($errorMsg)) { echo '<p class="alert alert-danger" role="alert">' .$errorMsg. '</p>';}?>
        <?php if(isset($successMessage)) { echo '<p class="alert alert-success" role="alert">' .$successMessage. '</p>';}?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="lastname"> 
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="firstname"> 
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="login"> 
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" maxlength="6" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary mb-5" name="validate">S'inscire</button>
        <a href="connexion.php"><p>J'ai déja un compte, je me connecte</p></a>
    </form>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="./js/app.js"></script>
</html>
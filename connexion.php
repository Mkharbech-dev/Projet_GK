<?php require './controller/connexion_controller.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>
<body>
<h1 class="text-center mt-5">Connexion</h1>
    <br><br>
    <form class="container" method = "POST">
        <!-- afficher le message d'erreur  -->
        <?php if(isset($errorMsg)) { echo '<p class="alert alert-danger" role="alert">' .$errorMsg. '</p>';} ?>
    <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Login</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary mb-5" name="validate">Se connecter</button>
        <a href="inscription.php"><p>Je n'ai pas un compte, je m'inscris</p></a>
    </form>
</body>
</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>
<body>

<div class="">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img width="25%" src="./images/logo.jpg" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
          <div class="navbar-nav">
        <?php if(isset($_SESSION['auth'])) {
                echo 'Bonjour :  <span style =" color : yellow;" class="mx-2"> '.$_SESSION['lastname'].' </span>';
                echo '<a class = "text-decoration-none text-white" href="./controller/logout.php"><span class="dec">Déconnexion</span></a>';
                
                }else{
                echo '<a class="nav-link active" aria-current="page" href="Inscription.php">inscription</a>
                <a class="text-decoration-none nav-link text-white" href="Connexion.php">connexion</a>';     
            }
        ?>
          </div>
      </div>
  </div>
</nav>
</div>
    
</body>
</html>
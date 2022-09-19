<!doctype html>
<?php
session_name('myid');
session_start(); 
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/cotton/2x/checkmark.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
    <title>Authentification</title>
  </head>
  <body style="background: #62bba7" class="text-white">
    <div class="container d-flex justify-content-center mt-5">
        <div class="row w-60">
            <div class="col-md text-center">
                <h1 class="display-2 text-center">Authentification</h1>
                <form class="form-inlin mt-4" method="POST" action="../controleur/FrontControleur.php?action=authentifier">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Votre mail" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Votre mot de passe" required>
                    </div>
                    <button type="submit" name="envoi" class="btn btn-primary px-5 py-2 font-weight-bold" style="color:white; background:orange; border-color:orange">Login</button>
                </form>
                <?php if (!empty($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <?php echo $_SESSION['message']; ?></div>
                <?php } ?>
                <div>Nouvel utilisateur ? <a class="alert-link" href="../controleur/FrontControleur.php?action=demander_inscription">Je crée mon compte</a></div>
                Vous avez oublié votre mot de passe ? <a class="alert-link" href="../controleur/FrontControleur.php?action=demander_motdepasse">Mot de passe</a>
            </div>          
        </div>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

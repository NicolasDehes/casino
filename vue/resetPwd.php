<!doctype html>
<?php session_name('myid');session_start(); ?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/cotton/2x/checkmark.png">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500&family=Poppins:ital,wght@0,200;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> 
    <title>Mot de passe oublié</title>
  </head>
  <body class="body">
    <img class="desktop-img" src="../asset/image/casino2.jpg">
    <section class="body__content">
        <header class="header">
            <h2 class="header__title"> Modifier votre mot de passe </h2>
        </header>
        <div class="login">
            <?php if (!empty($_SESSION['message'])) { ?>
                <div class="alert" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php } ?>
            <form class="form" method="POST" action="../controleur/FrontControleur.php?action=update_mot_de_passe">
                <input type="email" class="input--secondary" name="email" placeholder="Email" required>
                <input type="password" class="input--secondary" name="password" placeholder="Mot de passe" required>
                <input type="password" class="input--secondary" name="password_conf" placeholder="Confirmer le mot de passe" required>
                <button  type="submit" class="button button--secondary" >Réinitialiser le mot de passe</button>
                <p class="separator"><span class="separator-text">Ou</span></p>
                <a href="../controleur/FrontControleur.php?action=login" class="button">Retourner à l'authentification</a>
            </form>
        </div>
    </section>
        
    </body>
</html>

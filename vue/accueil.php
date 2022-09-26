<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/cotton/2x/checkmark.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500&family=Poppins:ital,wght@0,200;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <title>Accueil</title>
  </head>
  <body>
  <?php session_name('myid');session_start(); ?>
    <?php 
      $id_actif_navigation = 3; 
      require_once("./navigation.php") 
    ?>
    <header class="header">
      <h2 class="header__title">Bonjour <span class="header__title--orange"><?php echo $_SESSION["prenom_nom"] ?></span>, </h2>
      <img class="header__logo" src="../asset/image/logo.png">
    </header>

    <section class="home-solde">
      <p class="home-solde__texte">Vous avez : </p>
      <p class="home-solde__credit"> 100 <span  class="home-solde__unite"> crédits</span> </p>
    </section>
    </body>
</html>

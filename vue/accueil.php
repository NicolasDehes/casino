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
  <link rel="stylesheet" type="text/css" href="css/historique.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
  <link rel="stylesheet" type="text/css" href="css/accueil.css">
  <link rel="stylesheet" type="text/css" href="css/navigation.css">
  <title>Accueil</title>
</head>

<body id="body" class="body">
  <?php
  $id_actif_navigation = 3;
  require_once("./navigation.php")
  ?>
  <header class="header">
    <h2 class="header__title">Bonjour <a class="header__title--orange" href="../controleur/FrontControleur.php?action=profil"><?php echo $_SESSION['USER']['prenom'] . ' ' . $_SESSION['USER']['nom'] ?></a>, </h2>
    <img class="header__logo" src="../asset/image/logo.png" alt="logo">
  </header>

  <section class="home-solde">
    <p class="home-solde__texte">Vous avez : </p>
    <p class="home-solde__credit"> <?php echo $_SESSION['USER']['solde'] ?></p>
    <p class="home-solde__unite">crédits</p>
  </section>

  <?php if(count($_SESSION['HISTO']) > 0 ){ ?>
      <table class="historique">
        <thead class="historique__header">
          <td>Mise</td>
          <td>Gain</td>
          <td>Date</td>
        </thead>
        <tbody class="historique__body">
          <?php 
            foreach($_SESSION['HISTO'] as $value){ 
              ?>
              <tr class="historique__item <?php if($value['gain'] <= 0 ) echo 'historique__item--lost'?>">
                <td><?php echo $value['mise'] ?></td>
                <td><?php echo ($value['gain'] <= 0 )? 0 : $value['gain'] ?></td>
                <td><?php 
                  $date = new DateTime($value['dateJeu']); 
                  echo $date->format(' d/m/Y ') ?>
                </td>
              </tr><?php
            } 
          ?>
        </tbody>
      </table>
    <?php } ?>

  <!-- TODO a changer quand on aura implémenté l'administrateur -->
  <?php if (false) { ?>

    <?php
    foreach ($_SESSION['JEUX'] as $value) {
    ?>
      <div class="home-solde">
        <p class="home-solde__titre"> <?= $value['nom'] ?></p>
        <div class="home-solde__double">
          <p class="home-solde__texte">Minimum</p>
          <p class="home-solde__texte">Maximum</p>
        </div>
        <div class="home-solde__double">
          <p class="home-solde__info"><?= $value['minimum'] ?></p>
          <p class="home-solde__info"><?= $value['maximum'] ?></p>
        </div>
      </div>
    <?php
    }
    ?>

  <?php } else { ?>
    <div class="action">
      <a href="../controleur/FrontControleur.php?action=roulette" class="button">Accéder à la Roulette </a>
      <a href="../controleur/FrontControleur.php?action=pileouface" class="button button--secondary">Accéder au pile ou face </a>
    </div>
  <?php } ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.birds.min.js"></script>
  <script>
    VANTA.BIRDS({
      el: "#body",
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.00,
      minWidth: 200.00,
      scale: 1.00,
      scaleMobile: 1.00,
      backgroundColor: 0xffffff,
      birdSize: 1.50,
      quantity: 1.0,
      backgroundAlpha: 0.00
    });
  </script>
</body>

</html>
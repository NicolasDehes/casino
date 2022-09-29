<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/navigation.css">
        <link rel="stylesheet" type="text/css" href="css/roulette.css">
        <title>Roulette</title>
    </head>
    <body>
      <?php 
          $id_actif_navigation = 2; 
          require_once("./navigation.php") 
      ?>
      <?php 
          $id_actif_navigation = 2; 
          require_once("./navigation.php") 
      ?>

    <span class="solde">Solde : <span id="solde">100</span></span>

    <section class="body__container">
      <div class="roulette">
        <div class="roulette__container" id="roulette__container">
          <div class="roulette__item"><span class="roulette__label">x0</span></div>
          <div class="roulette__item"><span class="roulette__label">x1</span></div>
          <div class="roulette__item"><span class="roulette__label">x0</span></div>
          <div class="roulette__item"><span class="roulette__label">x3</span></div>
          <div class="roulette__item"><span class="roulette__label">x0</span></div>
          <div class="roulette__item"><span class="roulette__label">x2</span></div>
          <div class="roulette__item"><span class="roulette__label">x0</span></div>
          <div class="roulette__item"><span class="roulette__label">x2</span></div>
          <div>
              <div class="roulette__line"></div>
              <div class="roulette__line"></div>
              <div class="roulette__line"></div>
              <div class="roulette__line"></div>
          </div>
        </div>
      </div>
      <form class="roulette-form"  id="roulette-form">
          <input id="creditsInput" type="number" min="1" max="100" class="input" placeholder="Crédits misés" required>
          <button type="submit" class="button button--secondary button--min" id="play-btn">Jouer</button>
      </form>
      <section id="roulette-result" class="roulette-result">
          <p>Vous venez de jouer !</p>
          <p class="roulette-result__gain" id="win">Votre gain : <span id="gain"></span> crédits</p>
          <p class="roulette-result__gain roulette-result__gain--null" id="lose">Vous perdez : <span id="perte"></span> crédits</p>
          <button class="button button--secondary button--min" id="retry-btn">Rejouer</button>
      </section>
    </section>
    
   
    <script src="./js/roulette.js"></script>
  </body>
</html>

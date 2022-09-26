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

    <span class="solde">Solde : 100</span>

    <section class="body__container">
      <div class="roulette">
        <div class="roulette__container" id="roulette__container">
          <div class="roulette__item"><span class="roulette__label">x0</span></div>
          <div class="roulette__item"><span class="roulette__label">x1</span></div>
          <div class="roulette__item"><span class="roulette__label">x2</span></div>
          <div class="roulette__item"><span class="roulette__label">x3</span></div>
          <div class="roulette__item"><span class="roulette__label">x4</span></div>
          <div class="roulette__item"><span class="roulette__label">x5</span></div>
          <div class="roulette__item"><span class="roulette__label">x6</span></div>
          <div class="roulette__item"><span class="roulette__label">x7</span></div>
          <div>
              <div class="roulette__line"></div>
              <div class="roulette__line"></div>
              <div class="roulette__line"></div>
              <div class="roulette__line"></div>
          </div>
        </div>
      </div>
      <!-- TODO à implémenter -->
      <form class="roulette-form"  id="roulette-form">
          <input id="creditsInput" type="number" min="1" max="100" class="input" placeholder="Crédits misés" required>
          <button type="submit" class="button button--secondary button--min">Jouer</button>
      </form>
      <!-- TODO à implémenter QUAND ON VIENT DE JOUER
      <section class="roulette-result">
          <p>Vous multipliez votre mise part 5 !</p>
          <p class="roulette-result__gain">Votre gain : <span>50€</span></p>
          <p class="roulette-result__gain roulette-result__gain--null">Vous perdez : <span>50€</span></p>
          <button class="button button--secondary button--min">Rejouer</button>
      </section> -->
    </section>
    
   
    <script src="./js/roulette.js"></script>
  </body>
</html>

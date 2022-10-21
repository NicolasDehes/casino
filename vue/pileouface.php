<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="../vue/css/global.css" />
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" href="../vue/css/pileouface.css" />

    <title>Pile ou face </title>
</head>

<body>
    <?php
    $id_actif_navigation = 1;
    require_once("./navigation.php")
    ?>
    <main>
        <span class="solde">Solde : <span id="solde">
                <?php echo $_SESSION['USER']['solde'] ?>
            </span>
        </span>

        <div class="cut-background">

        </div>
        <div class="container">
            <div id="coin">
                <div class="heads">
                    <img src="../vue/img/coin0.png" alt="Image for coin's head" />
                </div>
                <div class="tails">
                    <img src="../vue/img/coin1.png" alt="Image for coin's tail" />
                </div>
            </div>

                <form class="toss-form" id="toss-form">
                    <div class="radio_container">
                        <label class="btn-radio__container" for="pile">
                            <input type="radio" class="radio" id="pile" name="pileouface" value="0" checked>
                            <span class="radio-btn"></span>
                            Pile
                        </label>

                        <label class="btn-radio__container" for="face">
                            <input type="radio" class="radio" id="face" name="pileouface" value="1">
                            <span class="radio-btn"></span>
                            Face
                        </label>
                    </div>
                    <br><input 
                        max="<?= min($_SESSION['USER']['solde'], $_SESSION['JEUX']['maximum'] ?? $_SESSION['USER']['solde']) ?>"
                        data-max="<?= $_SESSION['JEUX']['maximum'] ?>"
                        data-user="<?php echo $_SESSION['USER']['id'] ?>"
                        id="creditsInput" 
                        type="number" 
                        min="<?= $_SESSION['JEUX']['minimum'] ?? 1?>" 
                        class="input" 
                        placeholder="Crédits misés" 
                        required
                    >
                    <br><button type="submit" class="button button--secondary button--min" id="play-btn">Jouer</button>
                </form>
            
                <section id="toss-result" class="toss-result">
                    <p>Vous venez de jouer !</p>
                    <p class="toss-result__gain" id="win">Votre gain : <span id="gain"></span> crédits</p>
                    <p class="toss-result__gain toss-result__gain--null" id="lose">Vous perdez : <span id="perte"></span> crédits</p>
                    <button class="button button--secondary button--min" id="retry-btn">Rejouer</button>
                </section>
            
        </div>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>
    <script src="../vue/js/coin.js"></script>
</body>

</html>
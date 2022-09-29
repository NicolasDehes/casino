<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/css/pileouface.css" />
    <link rel="stylesheet" href="../vue/css/global.css" />
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <title>Pile ou face </title>
</head>
<body>
    <?php 
      $id_actif_navigation = 1; 
      require_once("./navigation.php") 
    ?>
    <main>
        <span class="solde">Solde : <?php echo $_SESSION['USER']['solde'] ?></span>

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
            
            <div>
                <form action="" method="post">
                    <div class="radio_container">
                        <label class="btn-radio__container" for="pile">
                            <input type="radio" class="radio" id="pile" name="pileouface" value="0" checked>
                            <span class="radio-btn"></span>    
                            Pile
                        </label>

                        <label class="btn-radio__container" for="face">
                            <input type="radio" class="radio" id="face" name="pileouface" value="1" >
                            <span class="radio-btn"></span>
                            Face
                        </label>
                    </div>
                    <br><input type="text" placeholder="Crédits misés" class="input " id="mise">
                    <br><input type="submit" class="button button--secondary button--min" onclick="toss()" value="Jouer">
                </form>
            </div> 
            <div>

            </div>
        </div>
        
    </main>
    <script src="../vue/js/coin.js"></script> 
</body>
</html>
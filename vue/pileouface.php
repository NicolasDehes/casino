<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/css/coin.css" />
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
                        <input type="radio" class="radio" id="pile" name="pile" value="0" >
                        <label for="pile">Pile</label>

                        <input type="radio" class="radio" id="face"  name="face" value="1" >
                        <label for="face">Face</label>
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
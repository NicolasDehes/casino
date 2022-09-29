<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/navigation.css">
        <link rel="stylesheet" type="text/css" href="css/historique.css">
        <title>Historique</title>
    </head>
    <body>
        <?php 
            $id_actif_navigation = 4; 
            require_once("./navigation.php") 
        ?>
    
        <div class="banner">
            <div class="banner__content"></div>
        </div>
        <h1 class="title">Roulette</h1>
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
                        <td><?php echo $value['gain'] ?></td>
                        <td><?php 
                            $date = new DateTime($value['dateJeu']); 
                            echo $date->format(' d/m/Y ') ?>
                        </td>
                    </tr><?php
                } 
                ?>
            
            </tbody>
        </table>
        <div class="double-btn">
            <a class="double-btn__item" style="<?php if($_SESSION['JEU'] == 1) echo 'z-index: 3; ' ?>" href="../controleur/FrontControleur.php?action=historique&jeu=roulette">Roulette</a>
            <a class="double-btn__item" style="<?php if($_SESSION['JEU'] == 2) echo 'z-index: 3; ' ?>" href="../controleur/FrontControleur.php?action=historique&jeu=pileouface">Pile ou Face</a>
        </div>
    </body>
</html>

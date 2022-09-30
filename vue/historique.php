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
        <?php if(count($_SESSION['HISTO']) > 0 ){?>
            <h1 class="title"><?php echo ($_SESSION['JEU'] == 1)? 'Roulette ': 'Pile ou face'; ?></h1>
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
            <div class="double-btn">
                <a class="double-btn__item <?php if($_SESSION['JEU'] == 1) echo "double-btn__item--selected" ?>" href="../controleur/FrontControleur.php?action=historique&jeu=roulette">Roulette</a>
                <a class="double-btn__item <?php if($_SESSION['JEU'] == 2) echo "double-btn__item--selected" ?>" href="../controleur/FrontControleur.php?action=historique&jeu=pileouface">Pile ou Face</a>
            </div>
        <?php }else{ ?>
            <p class="describe">Commencez à jouer pour voir l’historique de vos gains</p>
            <div class="action"> 
                <a href="../controleur/FrontControleur.php?action=roulette" class="button">Accéder à la Roulette  </a>
                <a href="../controleur/FrontControleur.php?action=pileouface" class="button button--secondary">Accéder au pile ou face  </a>
            </div>

        <?php } ?>

        
        
    </body>
</html>

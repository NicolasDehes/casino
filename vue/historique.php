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
                <tr class="historique__item">
                    <td>50</td>
                    <td>250</td>
                    <td>12/12/2019</td>
                </tr>
                <tr class="historique__item historique__item--lost">
                    <td>50</td>
                    <td>250</td>
                    <td>12/12/2019</td>
                </tr>
                <tr class="historique__item">
                    <td>50</td>
                    <td>250</td>
                    <td>12/12/2019</td>
                </tr>
                <tr class="historique__item historique__item--lost">
                    <td>50</td>
                    <td>250</td>
                    <td>12/12/2019</td>
                </tr>
                <tr class="historique__item">
                    <td>50</td>
                    <td>250</td>
                    <td>12/12/2019</td>
                </tr>
                <tr class="historique__item historique__item--lost">
                    <td>50</td>
                    <td>250</td>
                    <td>12/12/2019</td>
                </tr>
                <tr class="historique__item">
                    <td>50</td>
                    <td>250</td>
                    <td>12/12/2019</td>
                </tr>
                <tr class="historique__item historique__item--lost">
                    <td>50</td>
                    <td>250</td>
                    <td>12/12/2019</td>
                </tr>
            </tbody>
        </table>
        <div class="double-btn">
            <a class="double-btn__item">Roulette</a>
            <a class="double-btn__item">Pile ou Face</a>
        </div>
    </body>
</html>

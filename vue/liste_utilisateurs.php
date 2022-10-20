<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/navigation.css">
        <link rel="stylesheet" type="text/css" href="css/historique.css">
    <title>Liste des utilisateurs</title>
  </head>
  <body>
    <?php 
        $id_actif_navigation = 4; 
        require_once("./navigation.php") 
    ?>
    <div class="banner">
        <div class="banner__content"></div>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <div class="row w-60">
            <div class="col-md text-center">
                <h1 class="display-2 text-center">Liste des utilisateurs</h1>


                <table id="table_user" class="historique">       
                    <thead class="historique__header">
                        <th scope="col">Id</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Action</th>
                    </thead>
                <tbody class="historique__body">
                <?php
                    //$data = json_decode($_SESSION['tableau']); //to decode the string into an object
                    // Tableau des utilisateurs a été positionné en variable de session
                   $tableau=unserialize($_SESSION['allUsers']);
                  // var_dump($tableau) ;
                   $color = 0;
                   foreach ($tableau as $utilisateur) { 
                   var_dump($utilisateur)?>
                    <tr class="historique__item <?php if($color%2 != 0 ) echo 'historique__item--lost'?> ">
                    <td>
                        <?php echo $utilisateur->getId(); ?>
                    </td>
                    
                    <?php $color = $color+1 ?>
                    <?php }?>
                  </tbody>
                </table>


                <div><a href="../controleur/FrontControleur.php?action=accueil">Revenir à la page d'accueil</a></div>
            </div>     
        </div>      
    </div>
    <script>
        $(document).ready(function () {
        $('#table_user').DataTable();
    });
    </script>
</body>
</html>
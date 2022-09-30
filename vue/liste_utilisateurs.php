<!doctype html>
<?php require_once("../Autoloader.php");
session_name('myid');
session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/cotton/2x/checkmark.png">
    <title>Liste des utilisateurs</title>
  </head>
  <body style="background: #62bba7" class="text-white">
    <div class="container d-flex justify-content-center mt-5">
        <div class="row w-60">
            <div class="col-md text-center">
                <h1 class="display-2 text-center">Liste des utilisateurs</h1>
                <table id="table_user" class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //$data = json_decode($_SESSION['tableau']); //to decode the string into an object
                    // Tableau des utilisateurs a été positionné en variable de session
                   $tableau=$_SESSION['tableau']; 
                   foreach ($tableau as $utilisateur) { ?>
                    <tr>
                    <td>
                        <?php echo $utilisateur->getId(); ?>
                    </td>
                    <td>
                        <?php echo $utilisateur->getPrenom();?>
                    </td>
                    <td>
                        <?php echo $utilisateur->getNom();?>
                    </td>
                    <td>
                        <?php echo $utilisateur->getEmail(); ?>
                    </td>
                    <td>
                        <a href="../controleur/FrontControleur.php?action=supprimer_utilisateur&id=<?PHP echo $utilisateur->getId()?>">Supprimer</a> 
                    </td>
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
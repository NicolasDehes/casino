<!doctype html>
<?php require_once("../Autoloader.php");
session_name('myid');
session_start(); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/cotton/2x/checkmark.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
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
                        <?php echo $utilisateur->getMail(); ?>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- jQuery Datatable js -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
        $('#table_user').DataTable();
    });
    </script>
</body>
</html>
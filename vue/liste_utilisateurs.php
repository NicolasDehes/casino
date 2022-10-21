<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/navigation.css">
        <link rel="stylesheet" type="text/css" href="css/historique.css">
        <link rel="stylesheet" type="text/css" href="css/tooglebtn.css">
    <title>Liste des utilisateurs</title>
  </head>
  <body>
    <?php 
        $id_actif_navigation = 4; 
        require_once("./navigation.php") ;
    ?>
    <div class="banner">
        <div class="banner__content"></div>
    </div>
    <h1 class="title">Liste des utilisateurs</h1>

    <table class="historique">       
        <thead class="historique__header">
            <td>Id</td>
            <td>Prénom</td>
            <td>Nom</td>
            <td>Mail</td>
            <td>Solde</td>
            <td>Action</td>
            <td>Admin</td>
        </thead>
        <tbody class="historique__body">
            <?php
            //$data = json_decode($_SESSION['tableau']); //to decode the string into an object
            // Tableau des utilisateurs a été positionné en variable de session
            $tableau=$_SESSION['allUsers'];
            //var_dump($tableau);
            $color = 0;
            foreach ($tableau as $utilisateur) { ?>
                <tr class="historique__item <?php if($color%2 != 0 ) echo 'historique__item--lost'; ?> ">
                    <td id='idRow'>
                        <?php echo $utilisateur['id']; ?>
                    </td>
                    <td>
                        <?php echo $utilisateur['prenom']; ?>
                    </td>
                    <td>
                        <?php echo $utilisateur['nom']; ?>
                    </td>
                    <td>
                        <?php echo $utilisateur['email']; ?>
                    </td>
                    <td>
                        <?php echo $utilisateur['solde']; ?>
                    </td>
                    <td>
                        <a href="../controleur/FrontControleur.php?action=reinitialiser_solde&id=<?= $utilisateur['id']; ?>">Reinitialiser solde</a>
                    </td>
                    <td> 
                        <!-- Rounded switch -->
                        <label class="switch">
               
                                    <input class="tooggleAdmin" type="checkbox" data-id='<?= $utilisateur['id']?>' <?= $utilisateur['isAdmin']?"checked" : ""?> >
                                    <span class="slider round"></span>    
                        </label>
                          
                    </td>
                  
                </tr>
                
                <?php $color = $color+1 ; 
                
            } ?>
            
        </tbody>
    </table>
    <script src="./js/liste_utilisateurs.js"></script>
</body>

</html>
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
        $id_actif_navigation = 3; 
        require_once("./navigation.php") 
    ?>
    <header class="header header--user">
        <a href="../controleur/FrontControleur.php?action=accueil">
            <svg class="back" width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.939339 9.4246L7.3033 15.7886C7.88909 16.3744 8.83884 16.3744 9.42462 15.7886C10.0104 15.2028 10.0104 14.253 9.42462 13.6672L5.62132 9.86394L23 9.86394C23.8284 9.86394 24.5 9.19237 24.5 8.36394C24.5 7.53552 23.8284 6.86394 23 6.86394L5.62132 6.86394L9.42462 3.06064C10.0104 2.47486 10.0104 1.52511 9.42462 0.939322C8.83884 0.353534 7.88909 0.353534 7.3033 0.939321L0.939339 7.30328C0.353554 7.88907 0.353554 8.83882 0.939339 9.4246Z" fill="#F79A6F" stroke="#F79A6F"/>
            </svg>
        </a>
        <h2 class="header__title">Liste des utilisateurs</h2>
    </header>

    <table class="historique">       
        <thead class="historique__header">
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
                        <a href="../controleur/FrontControleur.php?action=reinitialiser_solde&id=<?= $utilisateur['id']; ?>" class="historique__item <?php if($color%2 != 0 ) echo 'historique__item--lost'; ?>">Reinitialiser solde</a>
                    </td>
                    <td> 
                        <!-- Rounded switch -->
                        <label class="switch">
               
                                    <input class="tooggleAdmin" type="checkbox" data-id='<?= $utilisateur['id']?>' <?= $utilisateur['isAdmin']?"checked" : ""?> <?php if($_SESSION['id_user']==$utilisateur['id']){echo 'disabled';}?> >
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
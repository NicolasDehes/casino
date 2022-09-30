<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/cotton/2x/checkmark.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500&family=Poppins:ital,wght@0,200;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/addCredit.css">
    <title>Retirer des crédits</title>
  </head>
  <body class="body">
    <?php 
        $id_actif_navigation = 5; 
        require_once("./navigation.php") 
    ?>
    <section class="body__content">
        <header class="header">
            <a href="../controleur/FrontControleur.php?action=profil"><svg class="back" width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.939339 9.4246L7.3033 15.7886C7.88909 16.3744 8.83884 16.3744 9.42462 15.7886C10.0104 15.2028 10.0104 14.253 9.42462 13.6672L5.62132 9.86394L23 9.86394C23.8284 9.86394 24.5 9.19237 24.5 8.36394C24.5 7.53552 23.8284 6.86394 23 6.86394L5.62132 6.86394L9.42462 3.06064C10.0104 2.47486 10.0104 1.52511 9.42462 0.939322C8.83884 0.353534 7.88909 0.353534 7.3033 0.939321L0.939339 7.30328C0.353554 7.88907 0.353554 8.83882 0.939339 9.4246Z" fill="#F79A6F" stroke="#F79A6F"/>
            </svg></a>
            <h2 class="header__title">Retirer des crédits </h2>
        </header>
        <div >
            <?php if (!empty($_SESSION['message'])) { ?>
                <div class="alert" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php } ?>
            <form class="form" method="POST" action="../controleur/FrontControleur.php?action=send_remove_credit">
                <input type="number" class="input" name="credits" placeholder="Crédits à retirer" required>
                <fieldset class="form__content form"> 
                    <legend class="form__titre">Coordonnées bancaires</legend>
                    
                    <input type="text" class="input" name="nom" placeholder="Nom du titulaire" required>
                    <input type="text" class="input" name="iban" placeholder="IBAN" required>

                </fieldset>
                <button type="submit" class="button">Récupérer son solde</button>
            </form>
            
        </div>
    </section>
   
  </body>
</html>

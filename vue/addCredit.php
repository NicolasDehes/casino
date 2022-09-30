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
    <title>Ajouter des crédits</title>
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
            <h2 class="header__title">Ajouter des crédits </h2>
        </header>
        <div >
            <?php if (!empty($_SESSION['message'])) { ?>
                <div class="alert" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php } ?>
            <form class="form" method="POST" action="../controleur/FrontControleur.php?action=send_add_credit">
                <input type="number" class="input" name="credits" placeholder="Crédits à ajouter" required>
                <fieldset class="form__content"> 
                    <legend class="form__titre">Mode de paiement</legend>
                    <input id="input-paypal" type="radio" class="radio" checked="checked" name="type"/>
                    <label for="input-paypal" class="radio__label">Paypal</label>

                    <input id="input-card" type="radio" class="radio" name="type"/>
                    <label for="input-card" class="radio__label">Carte bleu</label>

                    <div id="paypal" class="form">
                        <input type="email" class="input" name="email" placeholder="Email">
                    </div>

                    <div id="card" class="form">
                        <input type="text" class="input" name="numero" placeholder="Numéro de carte">
                        <input type="text" class="input" name="date" placeholder="Date d'expiration">
                        <input type="text" class="input" name="cryptogramme" placeholder="Cryptogramme visuel">
                    </div>
                </fieldset>
                <button type="submit" class="button">Payer</button>
            </form>
            
        </div>
    </section>
   
  </body>
</html>

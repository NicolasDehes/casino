<!doctype html>
<?php
session_name('myid');
session_start(); 
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/cotton/2x/checkmark.png">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500&family=Poppins:ital,wght@0,200;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> 
    <title>Login</title>
</head>
<body class="body">
    <img class="desktop-img" src="../asset/image/casino.jpg">
    <section class="body__content">
        <header class="header">
            <h2 class="header__title">Se connecter</h2>
        </header>
        <div class="login">
            <?php if (!empty($_SESSION['message'])) { ?>
                <div class="alert" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php } ?>
            <form class="form" method="POST" action="../controleur/FrontControleur.php?action=authentifier">
                <input type="email" class="input" name="email" placeholder="Email" required>
                <input type="password" class="input" name="password" placeholder="Mot de passe" required>
            <button type="submit" name="envoi" class="button">Se connecter</button>
            </form>
            
            <div class="messagesLogin">
            <p class="messageLogin">Mot de passe oublié ? <a href="../controleur/FrontControleur.php?action=demander_motdepasse" class="link link--strong">Cliquez ici</a></p>
            <p class="messageLogin">Vous n'avez pas de compte ? <br/><a href="../controleur/FrontControleur.php?action=demander_inscription" class="link">S'inscrire</a></p>
            </div>

            <p class="separator"><span class="separator-text">Ou</span></p>
            <div class="social-login">
            <a class="oauth-btn" href="#">
                <svg width="83" height="83" viewBox="0 0 83 83" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="83" height="83" rx="23" fill="#878ADB"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M20 42.1228C20 53.0605 27.9438 62.1557 38.3333 64V48.1105H32.8333V42H38.3333V37.1105C38.3333 31.6105 41.8772 28.5562 46.8895 28.5562C48.4772 28.5562 50.1895 28.8 51.7772 29.0438V34.6667H48.9667C46.2772 34.6667 45.6667 36.0105 45.6667 37.7228V42H51.5333L50.5562 48.1105H45.6667V64C56.0562 62.1557 64 53.0623 64 42.1228C64 29.955 54.1 20 42 20C29.9 20 20 29.955 20 42.1228Z" fill="white"/>
                </svg>
            </a>
            <a class="oauth-btn" href="#">
                <svg width="83" height="83" viewBox="0 0 83 83" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="83" height="83" rx="23" fill="#878ADB"/>
                <path d="M63 41.5145C63 54.0669 54.4617 63 41.8525 63C29.7631 63 20 53.171 20 41C20 28.829 29.7631 19 41.8525 19C47.7385 19 52.6906 21.1734 56.5059 24.7573L50.5582 30.5145C42.7777 22.9565 28.3092 28.6339 28.3092 41C28.3092 48.6734 34.398 54.8919 41.8525 54.8919C50.5053 54.8919 53.7479 48.6468 54.259 45.4089H41.8525V37.8419H62.6564C62.859 38.9685 63 40.0508 63 41.5145Z" fill="white"/>
                </svg>
            </a>
            </div>
        </div>
    </section>
</body>
</html>

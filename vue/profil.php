<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500&family=Poppins:ital,wght@0,200;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/profil.css">
    <title>Profil</title>
</head>

<body class="body">
    <?php
    $id_actif_navigation = 5;
    require_once("./navigation.php")
    ?>
    <section class="body__container">
        <div class="informations">
            <h1 class="informations__title">Informations <span>personnelles</span></h1>
            <p>Nom: <?php echo $_SESSION['USER']['nom'] ?></p>
            <p>Prénom: <?php echo $_SESSION['USER']['prenom'] ?></p>
            <p>Email: <?php echo $_SESSION['USER']['email'] ?></p>
            <div class="informations__buttons">
                <a href="../controleur/FrontControleur.php?action=deconnexion" class="informations__button">Se déconnecter</a>
                <a href="../vue/modifUser.php" class="informations__button">Modifier</a>
            </div>
        </div>
        <div class="credits">
            <p class="credit__number"><?php echo $_SESSION['USER']['solde'] ?></p>
            <p class="credit__label">crédits</p>
        </div>
        <div class="profil-btn">
            <a href="../controleur/FrontControleur.php?action=add_credit" class="button">Ajouter des crédits</a>
            <a href="../controleur/FrontControleur.php?action=remove_credit" class="button button--secondary">Retirer ses crédits</a>
        </div>
    </section>
</body>

</html>
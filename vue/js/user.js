function DeleteUser(e){
    if (confirm("Voulez vous vraiment supprimer vos compte ?\nL'ensemble de vos crédits seront perdu. ")) {
        window.location.href = "../controleur/FrontControleur.php?action=supprimer_utilisateur";
    }
}
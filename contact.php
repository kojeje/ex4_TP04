<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8"/>
        <title>Script PHP traitant les valeurs saisies dans le formulaire</title>

        <!--        lien feuille style-->
        <link rel="stylesheet" href="assets/css/custom.css"/>
</head>
<body>
<h1>Traitement de l'inscription (exemple)</h1>

<?php
    /* (1) Connexion au serveur MySQL (les "???" sont à compléter)
              * Paramètre(s) de la fonction : nom/adresse du serveur,
              * identifiant, mot de passe
              */
    $connexionBdd = mysqli_connect("localhost", "root", "root");

    //   Si tout les champs sont vides : afficher message
    if (empty($_POST['email']) && empty($_POST['password'])) {
        $message = "Erreur : les champs du formulaire sont vides.";
        echo $message;

        /* Optionnel : permet d'éviter les problèmes d'affichage de
                       * certains caractères accentués
                       */
        mysqli_set_charset($connexionBdd, "utf8");

        /* (2) Sélection de la base (le "???" est à compléter)
           * Paramètre(s) de la fonction : nom de la base, connexion
           */
        $selectionBdd = mysqli_select_db($connexionBdd, "bibliotheque");

    } elseif (empty($_POST['email'])) {
        $message = "Erreur : le champ 'email' du formulaire est vide.";
        echo $message;

    } elseif (empty($_POST['password'])) {
        $message = "Erreur : le champ 'password' du formulaire est vide.";
        echo $message;

    }


    else {
        $nom = $_POST['nom'];
        $adresse_email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $msg = $_POST['message'];
        $message= "
            <h1>Bravo! <br>
            Votre message est parti.... Vous êtes vraiment une lumière !
            <br></h1>

                <h4>Vos nom et prénom</h4>
                <p>$nom</p>


                <h4>Votre adresse email</h4>
                <p>$adresse_email</p>


                <h4>sujet</h4>
                <p>$sujet</p>

                <h4>Message</h4>
                <p>$msg</p>";


        echo $message;
    }

?>


<p class="text-center"><a href="contact_form.php" title="Retour au formulaire">Retour au formulaire</a></p>
</body>
</html>
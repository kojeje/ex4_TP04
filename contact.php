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
//Si tel ou tel champ sont vide afficher message désiré
        //si tout est vide
    if (empty($_POST['email']) && empty($_POST['password'])) {

    $message = "Erreur : les champs du formulaire sont vides.";

}  //si "email" est vide
        elseif (empty($_POST['email'])) {
    $message = "Erreur : le champ 'email' du formulaire est vide.";
}  //si "password" est vide
        elseif (empty($_POST['password'])) {
    $message = "Erreur : le champ 'password' du formulaire est vide.";
}  //si tout est renseigné {
        //variable $email est le résultat du champ renseigné "email"
        $email = $_POST['email'];
        //variable $password est le résultat du champ renseigné "email"
        $password = $_POST['password'];
        //variable $name est le résultat du champ renseigné "email"
        $name = $_POST['name'];
        //variable $message contient le message de bienvenue
        $message = "Bienvenue $name";



 	/* (1) Connexion au serveur MySQL (les "???" sont à compléter)
	* Paramètre(s) de la fonction : login/adresse du serveur,
	* email, mot de passe
	*/
	 $connexionBdd = mysqli_connect("localhost", "root", "root");

	 /* Optionnel : permet d'éviter les problèmes d'affichage de
	* certains caractères accentués
	*/
	 mysqli_set_charset($connexionBdd, "utf8");


	 /* (2) Sélection de la base (le "???" est à compléter)
	* Paramètre(s) de la fonction : login de la base, connexion
	*/
	 $selectionBdd = mysqli_select_db($connexionBdd, "test");

	 //Contenu de la requete mysql
	 $requete = "SELECT email, password, login FROM user_list WHERE email = '$email'";
	 //Contenu de la variable $resultat:
    // Envoi de la requête de puis le script actuel vers la base * de données,
    // et récupération du résultat de la requête
	 $resultat = mysqli_query($connexionBdd, $requete);
	 //Contenu de la variable $name


	 
while ($ligne_resultat = mysqli_fetch_assoc($resultat))
{
        $login = $ligne_resultat['login'];

            if ($email != $ligne_resultat['email']) {
                $message =  "Erreur d'email ou de mot de passe";
                //header('Location: http://localhost:8888/contact_form.php');
  //exit();

            } elseif($password != $ligne_resultat['password']){
                $message = "Erreur d'email ou de mot de passe";
                //header('Location: http://localhost:8888/contact_form.php');
  //exit();

            }  else {
                $message = "Bienvenue $login !";
            }
            echo $message;
        }


        mysqli_close($connexionBdd);




?>


<p class="text-center"><a href="contact_form.php" title="Retour au formulaire">Retour au formulaire</a></p>
</body>
</html>
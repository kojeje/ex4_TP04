<html>
<head>
	<title></title>
</head>
<body>

<?php
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
	 $selectionBdd = mysqli_select_db($connexionBdd, "bibliotheque");


	 // if "normal"
	 if (isset($_POST['debut_liste'])){
		 $debut_liste = $_POST['debut_liste'];
	 } else {
	 	 $debut_liste = 0;
	 }


	 // équivalent à

	 // opérateur ternaire
	 $debut_liste = isset($_POST['debut_liste']) ? $_POST['debut_liste'] : 0;






	 /* Création d'une requête MySQL sous la forme d'une chaîne de
	* caractères PHP
	*/
	 $requete = "SELECT FROM livre JOIN auteur ON auteur.id = livre.auteur_id 
LEFT JOIN lecteur ON lecteur.id = livre.lecteur_id WHERE livre.id >= " . $debut_liste . " LIMIT 3";


	 /* (3) Envoi de la requête de puis le script actuel vers la base
	* de données, et récupération du résultat de la requête
	*/
	 $resultat = mysqli_query($connexionBdd, $requete);


	 $compteur = 0;
	 /* (4) Traitement et affichage du/des résultat(s) */
	 while ($ligne_resultat = mysqli_fetch_assoc($resultat)) {

	 	$nb_jours = $ligne_resultat['nb_jours'];
	 	$id = $ligne_resultat['id'];
	 	$couverture = "couvertures/".$ligne_resultat['id'].".jpg";
		$titre = $ligne_resultat['titre'];
		$annee = $ligne_resultat['annee'];
		$resume_court = substr($ligne_resultat['resume'],0,100) . "...";
		$resume = $ligne_resultat['resume'];
		$login = $ligne_resultat['login_auteur'];
		$prelogin = $ligne_resultat['prelogin_auteur'];

		$date_emprunt = $ligne_resultat['date_emprunt'];

		$login_lecteur = $ligne_resultat['login_lecteur'];
		$prelogin_lecteur = $ligne_resultat['prelogin_lecteur'];

		$compteur = $ligne_resultat['id']+1;

		echo "<div>";
			echo "<h2>$titre</h2>";
			echo "<h6>Écrit par $login $prelogin</h6>";
			echo "<img src='$couverture' />";
			echo "<p><em>Publié en $annee</em></p>";
			echo "<span>$resume</span>";

			if ( is_null($date_emprunt) ) {
				echo "<span style='color: green'><strong>DISPONIBLE</strong></span>";
			} else {
				echo "<strong>Emprunté par $login_lecteur $prelogin_lecteur depuis $nb_jours jours</strong>";
			}

		echo "</div>";

 	}

 	echo "<a href='bibliotheque.php?debut_liste=".$compteur."'>Voir la suite</a>";


 	/* (5) Fermeture de la connexion au serveur MySQL */
 	mysqli_close($connexionBdd);
?>


</body>
</html>
<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 30/10/2018
     * Time: 13:41
     */



    $email = $_POST['email'];
    $password = $_POST['password'];

    $fails= [];
    if (empty($email)) {
        $fails[] = "email";
    }
    if (empty($password)) {
        $fails[] = "password";

    }

    if (count($fails) > 0) {
        echo "Les(s) champ(s) ";
        foreach ($fails as $fails) {
            echo $fails . " ";

        }
        echo "est/sont vide(s).";
    } else {

        $connexionBdd = mysqli_connect("localhost", "root", "root");
        mysqli_set_charset($connexionBdd, "utf8");
        $selectionBase = mysqli_select_db($connexionBdd, "test");

        $requete = "SELECT firstname, lastname 
        FROM user_list 
        WHERE email =  \"$email\" 
        AND password = \"$password\"
        LIMIT 1";

        $query = mysqli_query($connexionBdd = $requete);
        $result = mysqli_fetch_assoc($query);

        if (is_array($result)) {
            echo "Bonjour" . $result['firstname'] . " " . $result ['last_name'];
        } else {

            $requete_email = "SELECT COUNT (*) 
            FROM user_list 
            WHERE email = \"$email\";";
            $query_email = mysqli_query($connexionBdd, $requete_email);
            $result_email = mysqli_fetch_assoc($query_email);
            if ($result_email[0] == "0") {
                echo "le mot de passe n'est pas correctement écrit"
            } else {
                echo "L'email n'a pas été trouvé ... Veuillez créer votre compte...";
            }
            echo ($result_email[0] == "1")
                ? "le mot de passe n'est pas correctement écrit"
                : "L'email n'a pas été trouvé ... Veuillez créer votre compte...";


        }


    ?>

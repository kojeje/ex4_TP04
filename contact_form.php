<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8"/>
        <title>Formulaire de connexion</title>
        <link rel="stylesheet" href="assets/css/custom.css"/>
</head>
<body>
<h1>Formulaire de connexion</h1>

<form action="correction.php" method="post">

                <!--   CHAMPS mail-->
        <div>
                <!--       Label-->
                <label class="lbl" for="email">E-mail</label>

                <input id="email" name="email" type="email"/>
        </div>
                <!--   CHAMPS mail-->
        <div>
                <label class="lbl" for="password">Password:</label>
                <input type="password" id="password" name="password"
                       minlength="8"
                       placeholder="8 characters minimum" />
        </div>

        <!--   Bouton submit-->
        <div>
                <input id="connexion" name="connexion" type="submit" value="connexion"/>
        </div>
</form>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
</head>
<body class="inscription">

    <h1>Inscrivez vous :</h1>

    <form action="../controller/inscription_traitement.php" method="POST">
        <input class="inp" type="text" name="firstName" id="firstName" placeholder="Votre prénom">
        <input class="inp" type="text" name="lastName" id="lastName" placeholder="Votre nom">
        <input class="inp" type="email" name="email" id="email" placeholder="Votre eMail">
        <input class="inp" type="password" name="password" id="password" placeholder="Votre mot de passe">
        <input class="inp" type="password" name="password_retype" id="password_retype" placeholder="Encore le mot de passe">
        <input class="submit" type="submit" value="Inscription">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body class="home">

    <h3>Connectez vous</h3>

    <form action="../controller/connexion_traitement.php" method="POST">
        <input type="email" name="email" id="email" placeholder="Votre email">
        <input type="password" name="password" id="password" placeholder="Votre mot de passe">
        <input type="submit" value="connexion">
    </form>

    <a href="./inscription.php">Toujours pas inscrit ?</a>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blog</a>
        <?php if($_SESSION["user"]){?>
        <? if($_SESSION["user"]["isAdmin"]){ ?> <a type="button" href="/userlist" class="btn btn-outline-secondary">Admin</a> <? }?>
        <a type="button" href="/" class="btn btn-outline-danger">Déconnexion</a>
        <?php } ?>
    </div>
    </nav>
    <?= $content ?>
</body>
</html>
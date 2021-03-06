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
    <div class="container">
        <a class="navbar-brand" href="/">Blog</a>

        <div>
            <?php if($_SESSION["user"]){?>
                <a type="button" href="/admin" class="btn btn-outline-primary">Admin</a>
                <? if($_SESSION["user"]["isAdmin"]){ ?> <a type="button" href="/userList" class="btn btn-outline-secondary">UserList</a> <? }?>
                <a type="button" href="/logout" class="btn btn-outline-danger">LogOut</a>
            <?php } ?>

            <?php if(!$_SESSION["user"]){?>
                <a type="button" href="/signin" class="btn btn-outline-secondary">SignIn</a>
                <a type="button" href="/signup" class="btn btn-outline-primary">SignUp</a>
            <?php } ?>
        </div>
        
    </div>
    </nav>
    <?= $content ?>
</body>
</html>
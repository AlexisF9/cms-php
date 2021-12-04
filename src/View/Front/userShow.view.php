<div class="container">
    <?= var_dump($_SESSION["user"]) ?>
    <form method="POST" action="/userEdit">
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $_SESSION["user"]["firstName"] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $_SESSION["user"]["lastName"] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION["user"]["email"] ?>" required>
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label" for="flexCheckDefault">
                isAdmin ? <?= $_SESSION["user"]["isAdmin"] ?>
            </label>
            <input class="form-check-input" type="checkbox" <?= $_SESSION["user"]["isAdmin"] == "1" ? "checked" : "" ?> id="isAdmin" name="isAdmin">
        </div>
        <div class="mb-3">
            <label class="form-label">Password </label>
            <input type="password" class="form-control" id="passwd" name="passwd" required>
        </div>
        <?php if($data[0] == "wrong"){ ?>
            <div class="alert alert-danger" role="alert">
                Verify Password is wrong
            </div>
        <?php } ?>
        <div class="mb-3">
            <label class="form-label">Verify Password</label>
            <input type="password" class="form-control" id="vPasswd" name="vPasswd" required>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
</div>




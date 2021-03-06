<div class="container mt-5">
    <?php
        foreach ($data as $u) :
    ?>
        <div class="row mb-2">
            <div class="col-2">
                <h5><?= $u->getFirstName() ?></h5>
            </div>
            <div class="col-2">
                <p><?= $u->getLastName()?></p>
            </div>
            <div class="col-4">
                <p><?= $u->getEmail()?></p>
            </div>
            <div class="col-2">
                <label>isAdmin</label>
                <input type="checkbox" <?= $u->getIsAdmin() ? "checked" : "" ?> disabled/>
            </div>
            <?php if($u->getId() != $_SESSION["user"]["id"]){ ?>
                <div class="col-2">
                    <a href="userDelete/<?= $u->getId() ?>" class="btn btn-outline-danger">Delete User</a>
                </div>
            <?php } ?>
        </div>
        <hr>
    <?php
        endforeach; 
    ?>
</div>

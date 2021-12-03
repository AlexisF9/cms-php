<div class="container mt-5">
    <?php
        foreach ($data as $u) :
    ?>
        <div class="row mb-2">
            <div class="col">
                <h5><?= $u->getFirstName() ?></h5>
            </div>
            <div class="col">
                <p><?= $u->getLastName()?></p>
            </div>
            <div class="col">
                <p><?= $u->getEmail()?></p>
            </div>
            <div class="col">
                <p><?= $u->getEmail()?></p>
            </div>
            <div class="col">
                <label>isAdmin</label>
                <input type="checkbox" <?= $u->getIsAdmin() ? "checked" : "" ?> disabled/>
            </div>
            <div class="col">
                <a href="deleteUser/<?= $u->getId ?>" class="btn btn-outline-danger">Delete User</a>
            </div>
        </div>
        <hr>
    <?php
        endforeach; 
    ?>
</div>
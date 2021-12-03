<div >
    <?php
        foreach ($data as $u) :
    ?>
        <div>
                <h5><?= $u->getFirstName() ?></h5>
                <p><?= $u->getLastName()?></p>
                <p><?= $u->getEmail()?></p>
                <p><?= $u->getEmail()?></p>
                <label>isAdmin</label>
                <input type="checkbox" <?= $u->getIsAdmin() ? "checked" : "" ?> />
        </div>
    <?php
        endforeach; 
    ?>
</div>

<div class="allPosts">
    <?php
        foreach ($data as $p) :
    ?>
        <div class="card" style="width: 18rem;">
            <?php if( $p->getImg()){ ?><img class="card-img-top" alt="" src="<?= $p->getImg() ?>") /> <?php } ?>
            <div class="card-body">
                <h5 class="card-title"><?= $p->getTitle() ?></h5>
                <p class="card-text"><?= $p->getContent()?></p>
                <p class="card-text"><?= $p->getUsername() . " - " . $p->getCreatedAt() ?></p>
                <a href="/post/<?= $p->getId()?>" class="btn btn-primary">Lire plus</a>
            </div>
        </div>
    <?php
        endforeach; 
    ?>

    <?php
        echo $_SESSION["user"]['firstName'];
    ?>
</div>

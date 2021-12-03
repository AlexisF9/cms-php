<div>
    <?php
        foreach ($data as $p) :
    ?>
        <div>
            <h4><?= $p->getTitle() ?></h4>
            <p><?= $p->getContent()?></p>
            <?php if( $p->getImg()){ ?><img src="<?= $p->getImg() ?>") /> <?php } ?>
            <p><?= $p->getAuthor() . " - " . $p->getCreatedAt() ?></p>
        </div>
    <?php
        endforeach; 
    ?>
</div>

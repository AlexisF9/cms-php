
<div>
    <div>
        <h3><?= $data[0]->getTitle() ?></h3>
        <p><?= $data[0]->getContent() ?></p>
        <?php if( $data[0]->getImg()){ ?><img src="<?= $data[0]->getImg() ?>") /> <?php } ?>
        <p><?= $data[0]->getAuthor() . " - " . $data[0]->getCreatedAt() ?></p>
    </div>
    <div>
        <?php
            foreach ($data[1] as $c) :
        ?>
            <div>
                <h4><?= $c->getAuthor() ?></h4>
                <p><?= $c->getContent()?></p>
                <p><?= $c->getCreatedAt()?></p>
            </div>
        <?php
            endforeach; 
        ?>
    </div>
</div>
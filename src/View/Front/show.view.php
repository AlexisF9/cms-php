
<div class='postGlobalContainer'>
    <div class='postContainer'>
        <h3 class='postTitle'><?= $data[0]->getTitle() ?></h3>
        <p class='postDate'><?= $data[0]->getUsername() . " - " . $data[0]->getCreatedAt() ?></p>
        <?php if( $data[0]->getImg()){ ?><img src="<?= $data[0]->getImg() ?>") class="postImage" />
        <?php } else{ ?> <img class="card-img-top" src="http://beepeers.com/assets/images/tradeshows/default-image.jpg"/> <?php } ?>
        <p><?= $data[0]->getContent() ?></p>
        <a href="/postEdit/<?php $data[0]->getId()?>" type="button" class="mb-2 btn btn-outline-warning">Edit</a>
        <a href="/postDelete/<?php $data[0]->getId()?>" type="button" class="btn btn-danger">Delete</a>
    </div>
    <div class='commentGlobalContainer'>
        <?php
            foreach ($data[1] as $c) :
        ?>
            <div class='commentContainer'>
                <h4 class='commentAuthor'><?= $c->getUsername() ?></h4>
                <p class='commentContent'><?= $c->getContent()?></p>
                <p class='commentDate'><?= $c->getCreatedAt()?></p>
            </div>
        <?php
            endforeach; 
        ?>
    </div>
</div>
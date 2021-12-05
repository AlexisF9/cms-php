
<div class='postGlobalContainer'>
    <div class='postContainer'>
        <h3 class='postTitle'><?= $data[0]->getTitle() ?></h3>
        <p class='postDate'><?= $data[0]->getUsername() . " - " . $data[0]->getCreatedAt() ?></p>
        <?php if( $data[0]->getImg()){ ?><img src="<?= $data[0]->getImg() ?>") class="postImage" />
        <?php } else{ ?> <img class="card-img-top" src="http://beepeers.com/assets/images/tradeshows/default-image.jpg"/> <?php } ?>
        <p><?= $data[0]->getContent() ?></p>
        <?php if($_SESSION["user"]["isAdmin"] || $_SESSION["user"]["id"] == $data[0]->getAuthor()){ ?>
            <a href="/postEdit/<?= $data[0]->getId()?>" type="button" class="mb-2 btn btn-outline-warning">Edit</a>
            <a href="/postDelete/<?= $data[0]->getId()?>" type="button" class="btn btn-danger">Delete</a>
        <?php } ?>
    </div>
    <?php if($_SESSION["user"]){?>
        <div class="mt-5">
            <h3>Écrire un commentaire</h3>
            <form method="POST" action="/myComment/<?= $data[0]->getId() ?>">
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea type="textarea" class="form-control" id="content" name="content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>
    <?php } ?>
    <div class='commentGlobalContainer'>
        <?php
            foreach ($data[1] as $c) :
        ?>
            <div class='commentContainer'>
                <h4 class='commentAuthor'><?= $c->getUsername() ?></h4>
                <p class='commentContent'><?= $c->getContent()?></p>
                <p class='commentDate'><?= $c->getCreatedAt()?></p>
                <?php if($_SESSION["user"]["isAdmin"] || $_SESSION["user"]["id"] == $c->getAuthor()){ ?>
                    <a href="/commentEdit/<?= $c->getId() . "-" . $data[0]->getId() ?>" type="button" class="mb-2 btn btn-outline-warning">Edit</a>
                    <a href="/commentDelete/<?= $c->getId()  . "-" . $data[0]->getId() ?>" type="button" class="mb-2 btn btn-danger">Delete</a>
                <?php } ?>
            </div>
        <?php
            endforeach; 
        ?>
    </div>
</div>
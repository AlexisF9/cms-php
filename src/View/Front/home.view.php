<div class="container">
    <h2 class="mt-5 mb-5">Bonjour <?= $_SESSION["user"]['firstName'];?> !</h2>

    <?php if($_SESSION["user"]){?>
        <div class="addPost">
            <h3>Écrire un post</h3>
            <form method="POST" action="/mypost">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="Mon titre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea type="textarea" class="form-control" id="content" name="content" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Picture</label>
                    <input type="text" class="form-control" id="img" name="img" placeholder="link">
                </div>
                <div class="author">
                    <?php echo '<input type="text" class="form-control" id="author" name="author" value="'.$_SESSION['user']['id'].'">'; ?>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>   
    <?php } ?>

    <div class="allPosts">
        <?php
            foreach ($data as $p) :
        ?>
            <div class="card" style="width: 18rem;">
                <?php if( $p->getImg()){ ?><img class="card-img-top"  src="<?= $p->getImg() ?>") />
                <?php } else{ ?> <img class="card-img-top" src="http://beepeers.com/assets/images/tradeshows/default-image.jpg"/> <?php } ?>
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
    </div>

</div>

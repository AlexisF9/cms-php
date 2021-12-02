<h1>Home page</h1>

<?php

foreach ($vars as $post) :
    ?>
    <div>
        <h2><?= $post->getTitre(); ?></h2>
        <p><?= substr($article->getContent(), 0, 200); ?></p>
    </div>
<?php endforeach; ?>
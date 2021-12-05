<div class='container'>
    <div>
        <?= var_dump($data) ?>
        <form method="POST" action="/editComment/<?= $data[0]->getId() . "-" . $data[1] ?>">
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea type="textarea" class="form-control" id="content" name="content" required><?= $data[0]->getContent() ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>
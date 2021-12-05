<div class='container'>
    <div>
        <form method="POST" action="/editPost/<?= $data[0]->getId() ?>">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $data[0]->getTitle() ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea type="textarea" class="form-control" id="content" name="content" required><?= $data[0]->getContent() ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Picture</label>
                <input type="text" class="form-control" id="img" name="img" placeholder="link" value="<?= $data[0]->getImg() ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>
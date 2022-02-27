<h1>Create Video</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Video title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $video['title'] ?>">
    </div>
    <div class="form-group">
        <label>Video url</label>
        <textarea class="form-control" name="video_url"><?php echo $video['video_url'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <input type="number" step=".01" name="category_id" class="form-control" value="<?php echo $_GET['id'] ?>">
    </div>
    <button type="botton" class="btn btn-primary">Submit</button>
</form>
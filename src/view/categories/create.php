<h1>Create Category</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Categrory Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $category['name'] ?>">
    </div>
    <button type="botton" class="btn btn-primary">Submit</button>
</form>
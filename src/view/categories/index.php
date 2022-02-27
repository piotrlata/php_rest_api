<h1>Category List</h1>

<p>
    <a href="../categories/create" type="button" class="btn btn-sm btn-success">Add Category</a>
</p>
<form action="" method="get">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $search ?>">
        <div class="input-group-append">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
    </div>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Added Date</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $i => $category) { ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td><?php echo $category['name'] ?></td>
            <td><?php echo $category['added_date'] ?></td>
            <td>
                <a href="../categories/videos?id=<?php echo $category['id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
                <form method="post" action="../categories/delete" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $category['id'] ?>"/>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
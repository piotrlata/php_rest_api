<h1>Videos List</h1>

<p>
    <a href="../categories/videos/create?id=<?php echo $_GET['id'] ?>" type="button" class="btn btn-sm btn-success">Add Video</a>
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
        <th scope="col">Title</th>
        <th scope="col">Video Url</th>
        <th scope="col">Added Date</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($videos as $i => $video) { ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td><?php echo $video['title'] ?></td>
            <td><?php echo $video['video_url'] ?></td>
            <td><?php echo $video['added_date'] ?></td>
            <td>
                <a href="../categories/videos/view?id=<?php echo $video['id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
                <form method="post" action="../categories/videos/delete" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $video['id'] ?>"/>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
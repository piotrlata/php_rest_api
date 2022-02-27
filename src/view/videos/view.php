<form method="get" enctype="multipart/form-data">
    <div class="form-group">
        <h2>Video title:</h2>
        <h3><?php echo $video['title'] ?></h3>
    </div>
    <div class="form-group">
        <h2>Video Url:</h2>
        <h3><?php echo $video['video_url'] ?></h3>
    </div>
    <div class="form-group">
        <h2>Category:</h2>
        <h3><?php echo $video['category_id'] ?></h3>
    </div>
</form>
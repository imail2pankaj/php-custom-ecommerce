<?php
include './db/db-connect.php';
include './pages/home-slider-update.php';
include './include/top.php';
?>
<div class="create-body ">
    <div class="form-update">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
                    <h2>Update Slide</h2>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                <?php
                if ($message) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $message ?>
                    </div>
                <?php }
                ?>
                <div class="row">
                    <div class="mt-2">
                        <label for="exampleInputtext" class="form-label d-block">Image</label>
                        <img src="./uploads/slides/<?= $slider_image?>" alt="img" width="80px">
                    </div>
                    <div class="col-12 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Image</label>
                        <input type="file" class="form-control" id="exampleInputtext" name="slider_image" placeholder="Enter Slide">

                        <div class="col-12 mb-3 mt-2">
                            <label for="exampleInputtext" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="slider_name" placeholder="Enter slide Name" value="<?= $slider_name ?>" autofocus>
                        </div>
                        <div class="col-12 mb-3 mt-2">
                            <label for="exampleInputtext" class="form-label">Description<span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" cols="30" rows="3"><?=  $description ?></textarea>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success" name="update-slide">Save changes</button>
                <a class="btn btn-secondary" href="home-slider-list.php">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/home-slider-add.php';

?>
<div class="create-body ">
    <div class="form-add">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
                    <h2>Add Home slider</h2>
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
                <div class="col-12 mb-3 mt-2">
                    <label for="exampleInputfile" class="form-label">Image<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="exampleInputfile" name="slider_image">
                </div>

                <div class="col-12 mb-3 mt-2">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="slider_name" value="<?= isset($_POST['slider_name']) ? $_POST['slider_name'] : "" ?>">
                </div>
                <div class="col-12 mb-3 mt-2">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <textarea name="description" class="form-control"  cols="30" rows="3"><?= isset($_POST['description']) ? $_POST['description'] : "" ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="add">Submit</button>
                <a class="btn btn-secondary" href="home-slider-list.php">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include './include/bottom.php'; ?>
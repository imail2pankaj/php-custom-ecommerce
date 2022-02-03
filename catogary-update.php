<?php
include './db/db-connect.php';
include './pages/catogary-update.php';
include './include/top.php';
?>
<div class="create-body ">
    <div class="form-add">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
                    <h2>Update Catogary</h2>
                </div>
            </div>
            <form method="post">
                <?php
                if ($message) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $message ?>
                    </div>
                <?php }
                ?>
                <div class="row">
                    <div class="col-12 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Catogary<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputtext" name="catogary_name" placeholder="Enter Catogary" value="<?= $row['catogary_name'] ; ?>" autofocus>
                    </div>
                    
                </div>
            
                <button type="submit" class="btn btn-primary" name="update-catogary">Submit</button>
                <a class="btn btn-secondary" href="catogary-list.php">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
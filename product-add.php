<?php
include './db/db-connect.php';
include './pages/product-add.php';
include './include/top.php';
?>
<div class="create-body ">
    <div class="form-add">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
                    <h2>Add product</h2>
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
                    <div class="col-6 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputtext" name="product_name" placeholder="Enter Product Name" value="<?= isset($_POST['product_name']) ? $_POST['product_name'] : "" ?>" autofocus>
                    </div>
                    <div class="col-6 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Category<span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="catogary_id">
                            <option value="">Select Category</option>
                            <?php
                            $query = "select id,catogary_name from catogary";
                            $result = mysqli_query($mysqli, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['catogary_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Price<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputtext" name="product_price" placeholder="Enter Product Price" value="<?= isset($_POST['product_price']) ? $_POST['product_price'] : "" ?>">
                    </div>
                    <div class="col-6 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Selling Price<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputtext" name="selling_price" placeholder="Enter Selling Price" value="<?= isset($_POST['selling_price']) ? $_POST['selling_price'] : "" ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Image<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="exampleInputtext" name="product_image" placeholder="Enter Product Image" value="<?= isset($_FILES['product_image']) ? $_FILES['product_image'] : "" ?>">
                    </div>
                    <div class="col-6 mb-3 mt-2">
                        <label for="form-check-label" class="form-label d-block">Status<span class="text-danger">*</span></label>
                        <input class="form-check-input" type="radio" name="status" value="1" <?= isset($_POST['status']) && $_POST['status'] == '1' ? 'checked' : "" ?>>
                        <label class="form-check-label" for="flexRadioDefault1">Active
                        </label>
                        <input class="form-check-input" type="radio" name="status" value="0" <?= isset($_POST['status']) && $_POST['status'] == '0' ? 'checked' : "" ?>>
                        <label class="form-check-label" for="flexRadioDefault2">Inactive
                        </label>
                    </div>

                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_desc" value="<?= isset($_POST['product_desc']) ? $_POST['product_desc'] : "" ?>"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="add-product">Submit</button>
                <a class="btn btn-secondary" href="product-list.php">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
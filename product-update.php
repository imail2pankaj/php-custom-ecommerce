<?php
include './db/db-connect.php';
include './pages/product-update.php';
include './include/top.php';
?>
<div class="create-body ">
    <div class="form-update">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
                    <h2>Update product</h2>
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
                    <div class="col-12 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputtext" name="product_name" placeholder="Enter Product Name" value="<?= $row['product_name'] ?>" autofocus>
                    </div>

                    <div class="col-12 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Image</label>
                        <input type="file" class="form-control" id="exampleInputtext" name="product_image" placeholder="Enter Product Image">
                        <input type="text" class="form-control mt-1 w-50" name="product_image" value="<?= $row['product_image'] ?>" disabled>
                        <div class="mt-2">
                            <label for="exampleInputtext" class="form-label d-block">Image</label>
                            <img src="./uploads/products/<?= $row['product_image']  ?>" alt="img" width="80px" value="<?php echo $product_image?>">
                        </div>
                    </div>

                    <div class="mb-0">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_desc"><?= $row['product_desc'] ?></textarea>
                    </div>

                    <div class="col-12 mb-3 mt-2">
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

                    <div class="col-12 mb-3 mt-2">
                        <label for="exampleInputnumber" class="form-label">Product Price<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputnumber" name="product_price" placeholder="Enter Price" value="<?php echo $product_price; ?>">
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Submit
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update product</h5>
                                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               Do you want to update ?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="update-product">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="product-list.php">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
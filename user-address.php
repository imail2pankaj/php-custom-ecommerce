<?php
include './db/db-connect.php';
include './pages/user-address.php';
include './include/top.php';
?>
<div class="create-body ">
    <div class="form-create">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
                    <h6> <i class="fas fa-arrow-circle-left pe-auto" style="margin-top: 13px;" onclick="history.go(-1);"></i>
                        Back to Cart</h6>
                </div>
            
                <form method="post">
                    <?php
                    if ($message) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?= $message ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-3 mb-2 mt-1">
                            <label for="exampleInputtext" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="name" placeholder="Name" value="<?= isset($_POST['name']) ? $_POST['name'] : "" ?>" autofocus>
                        </div>
                        <div class="col-3 mb-2 mt-1">
                            <label for="exampleInputnumber1" class="form-label">Mobile No.<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputnumber" name="phone" placeholder="Mobile No." value="<?= isset($_POST['phone']) ? $_POST['phone'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 mb-2 mt-1">
                            <label for="exampleInputtext" class="form-label">Pincode<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="pincode" placeholder="Pincode" value="<?= isset($_POST['pincode']) ? $_POST['pincode'] : "" ?>" autofocus>
                        </div>
                        <div class="col-3 mb-2 mt-1">
                            <label for="exampleInputtext" class="form-label">City<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="city" placeholder="City" value="<?= isset($_POST['city']) ? $_POST['city'] : "" ?>" autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 mb-2 mt-1">
                            <label for="exampleInputtext" class="form-label">State<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="state" placeholder="State" value="<?= isset($_POST['state']) ? $_POST['state'] : "" ?>" autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="exampleInputEmail1" class="form-label">Address<span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" id="textareaadd1" cols="30" rows="3" name="address"><?= isset($_POST['address']) ? $_POST['address'] : "" ?></textarea>
                        </div>
                    </div>

                    <a class="btn btn-outline-danger" href="user-address.php?id=<?= $id?>">Add</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './include/bottom.php'; ?>
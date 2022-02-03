<?php
include './db/db-connect.php';
include './pages/check-out.php';
include './include/top.php';
?>
<div class="container">
    <div class="row mt-2 ">
        <div class=" col-8 mt-1">
            <h6> <i class="fas fa-arrow-circle-left pe-auto" style="margin-top: 13px;" onclick="history.go(-1);"></i>
            </h6>
            <form action="order-details.php" method="get">
                <div class="accordion" id="accordionExample">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne<?= $row['id'] ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $row['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?= $row['id'] ?>">
                                    <input class="form-check-input m-2" type="radio" name="address_id" value="<?= $row['id'] ?>">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?= $row['name'] ?> <i class="fas fa-phone-alt m-2 "></i> <?= $row['phone'] ?>
                                    </label>
                                </button>
                            </h2>
                            <div id="collapseOne<?= $row['id'] ?>" class="accordion-collapse  " aria-labelledby="headingOne<?= $row['id'] ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p> <?= "Address : " . $row['address'] ?> </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a href="check-out.php?action=show-new-address-form" target="_self" class="btn btn-primary mt-3"><i class="fa fa-plus"></i> Add New Address</a>
                <button type="submit" class="btn btn-outline-success mt-3" name="checkout">Place Order</button>
            </form>
            <?php if (isset($_GET['action']) && $_GET['action'] == 'show-new-address-form') { ?>
                <form method="post">
                    <div class="row">
                        <div class="col-6 mb-2 mt-1">
                            <label for="exampleInputtext" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="name" placeholder="Name" value="<?= isset($_POST['name']) ? $_POST['name'] : "" ?>" autofocus>
                        </div>
                        <div class="col-6 mb-2 mt-1">
                            <label for="exampleInputnumber1" class="form-label">Mobile No.<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputnumber" name="phone" placeholder="Mobile No." value="<?= isset($_POST['phone']) ? $_POST['phone'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2 mt-1">
                            <label for="exampleInputtext" class="form-label">Pincode<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="pincode" placeholder="Pincode" value="<?= isset($_POST['pincode']) ? $_POST['pincode'] : "" ?>" autofocus>
                        </div>
                        <div class="col-6 mb-2 mt-1">
                            <label for="exampleInputtext" class="form-label">City<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="city" placeholder="City" value="<?= isset($_POST['city']) ? $_POST['city'] : "" ?>" autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2 mt-1">
                            <label for="exampleInputtext" class="form-label">State<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputtext" name="state" placeholder="State" value="<?= isset($_POST['state']) ? $_POST['state'] : "" ?>" autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="exampleInputEmail1" class="form-label">Address<span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" id="textareaadd1" cols="30" rows="3" name="address"><?= isset($_POST['address']) ? $_POST['address'] : "" ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3" name="save">Save</button>
                    <a href="check-out.php" target="_self" class="btn btn-outline-danger mt-3"> Cancel</a>
                </form>
            <?php } ?>
        </div>
        <div class="border col-4 mt-5">
            <table class="table">
                <th style="width: 100%;">
                    <h5 class="text-secondary">Price Details</h5>
                </th>
                <tr>
                    <td>
                        <h6 class="d-inline" style="font-weight: normal;">Price</h6>
                    </td>
                    <td>
                        <span><?php echo "$" . $price ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6 style="font-weight: normal;">Items</h6>
                    </td>
                    <td>
                        <span><?= cartCounter(); ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span>Delivery Charges</span>
                    </td>
                    <td>
                        <span class="text-success"> FREE</span>
                    </td>
                </tr>

                <td>
                    <h4 style="font-weight: normal;"> Total Amount</h4>
                </td>
                <td>
                    <span> <b><?php echo "$" . $price; ?> </b></span>
                </td>

            </table>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
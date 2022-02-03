<?php
include './db/db-connect.php';
include './pages/user-orders.php';
include './include/top.php';
?>
<div class="container">
    <div class="row">
        <div class="accordion shadow mb-5 bg-body rounded" id="accordionExample">
            <?php
            foreach ($orders as $order) { ?>
                <div class="accordion-item mt-3 mb-3">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <label class="form-check-label d-flex justify-content-between w-100 me-2" for="flexRadioDefault1">
                                <span>
                                    <i class="fa fa-wallet"></i>
                                    <?= $order['order_id']; ?>
                                </span>

                                <b>Price : <i class='fas fa-dollar-sign'></i> <?= $order['totalprice'] ?></b>
                            </label>
                        </button>
                    </h2>

                    <div id="collapseOne" class="accordion-collapse collapse show " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <!-- <?php print_r($order['orderItem']) ?> -->
                            <b class="text-dark"><i class="fas fa-user-circle"></i> <?= $order['name'] ?> <br></b>
                            <div class="row">
                                <div class="col-4">
                                    <?= "<i class='fas fa-home'></i><b class='text-primary'> Address :</b> " . $order['address'] . ", " ?> <br>
                                    <?= $order['city'] . " , " . $order['state'] . ". " ?> <br>
                                </div>
                                <div class="col-4">
                                    <?= "<i class='fas fa-phone-alt'></i> <b class='text-primary'>Phone Number : </b>" . $order['phone'] . ", " ?> <br>
                                    
                                </div>
                                <div class="col-4">
                                    <?= "<b class='text-primary'>Order On : </b>" . formattedDateTime($order['created_at'])  ?> <br>
                                    <b class="text-primary">Order Status :</b> Pending <br>
                                    <b class="text-primary">Payment Status :</b> <b  class="text-success">PAID </b> /<b class="text-danger">  FAILED</b>  <br>
                               
                                </div>

                                <div class="col-12">
                                    <?php foreach ($order['orderItem'] as $ordersItems) { ?>
                                        <div class="row border mt-2">
                                            <div class="col-3  p-3">
                                                <img src="<?= './uploads/products/' . $ordersItems['product_image'] ?>" class="border" alt="img" width="140px;" height="123px;"><br>
                                            </div>
                                            <div class="col-3  p-3">
                                                <b><?= $ordersItems['product_name'] ?></b>
                                            </div>
                                            <div class="col-3  p-3">
                                                <span><?= "Price : <i class='fas fa-dollar-sign'></i> "  . $ordersItems['product_price'] ?></span>
                                            </div>
                                            <div class="col-3  p-3">
                                                <span><?= "Quantity : " . $ordersItems['quantity'] ?></span>
                                            </div>
                                        </div>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>




<?php include './include/bottom.php'; ?>
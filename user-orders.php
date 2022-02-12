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
                                    <b class="text-primary">Order Status :</b> <?= orderStatus($order['order_status']) ?> <br>
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
                                                <span><?= "Quantity : " . $ordersItems['quantity'] ?></span><br><br><br><br>
                                                <?php if ($order['order_status'] == 7) {
                                                    $product_review = getProductOrderReview($mysqli, $ordersItems['id'], $order['id']);
                                                    if ($product_review) { ?>
                                                        <button type="button" class="review btn btn-primary" data-review_details='<?php echo json_encode($product_review) ?>' data-product_id="<?= $ordersItems['id'] ?>" value="<?= $order['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                            Edit review
                                                        </button>
                                                    <?php  } else { ?>
                                                        <button type="button" class="review btn btn-primary" data-product_id="<?= $ordersItems['id'] ?>" value="<?= $order['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                            Submit a review
                                                        </button>
                                                    <?php }
                                                    ?>
                                                <?php }  ?>
                                            </div>
                                        </div>
                                    <?php  } ?>
                                    <div class="row">
                                        <div class="col-8 mt-2 ">
                                        </div>
                                        <div class="col-4 mt-2">
                                            <?php if ($order['order_status'] == 3) { ?>
                                                <button type="button" class="order-cancel btn btn-danger" value="<?= $order['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                                    Cancel Order
                                                </button>
                                            <?php } else if ($order['order_status'] == 7) { ?>
                                                <button type="button" class="order-return btn btn-primary" value="<?= $order['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Return Order
                                                </button>
                                            <?php } ?>
                                            <?php if ($order['order_status'] == 8) { ?>
                                                <span class="text-danger border">Order Cancelled </span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="review_form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rating & Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="product_review">
                    <input type="hidden" name="review_id" id="review_id">
                    <input type="hidden" name="action" value="send_review" id="action">
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <div class="form-group mb-2">
                        <label for="textarea" class="text-muted d-block">Rate</label>
                        <input type="hidden" class="form-control " value="0" name="rate" id="rate">
                        <div class="rateit" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-step="1" data-rateit-max="5">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="textarea" class="text-muted">Title</label>
                        <input type="text" class="form-control" value="" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="textarea" class="text-muted">Description</label>
                        <textarea name="description" id="review_desc" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="send_review btn btn-success">Submite Review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Return Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="textarea" class="text-muted">Reason</label>
                <textarea name="reason" id="return_reason" class="form-control" rows="3" name="return_order_desc"><?= $row['id'] ?></textarea>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="return_order">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="return-reason btn btn-primary">Continue</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Cancel Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this order ?
            </div>
            <div class="modal-footer">
                <input type="hidden" id="cancel_order_id">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal1">No,Continue</button>
                <button type="button" class="update-cancel-order btn btn-primary">Yes Sure</button>
            </div>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
<script src="./js/jquery.rateit.min.js"></script>
<link rel="stylesheet" href="./css/rateit.css">
<script>
    $(document).on('click', '.order-cancel', function() {
        var $data = $(this).val();
        $('#cancel_order_id').val($data);
    });
    $(document).on('click', '.update-cancel-order', function() {
        var $data = $('#cancel_order_id').val();
        var url = 'user-orders.php?action=update-cancel-order&id=' + $data;
        $.ajax({
            type: 'GET',
            url: url,
            success: function(output) {
                location.reload();
            },
            error: function(output) {
                alert("Not Updated");
            }
        });
    });

    $(document).on('click', '.order-return', function() {
        var $data = $(this).val();

        $('#return_order').val($data);

    });
    $(document).on('click', '.return-reason', function() {
        var $data = $('#return_order').val();
        var $return_reason = $('#return_reason').val();
        var url = 'user-orders.php?action=return-reason&id=' + $data + '&return_reason=' + $return_reason;
        $.ajax({
            type: 'GET',
            url: url,
            success: function(output) {
                location.reload();
            },
            error: function(output) {
                alert("Not Updated");
            }
        });
    });

    $(document).on('click', '.review', function() {
        var $data = $(this).val();
        var product_id = $(this).data('product_id');
        var review_details = $(this).data('review_details');
        if (review_details) {
            $('#title').val(review_details.review_title);

            $('#review_id').val(review_details.id);
            $('#review_desc').val(review_details.reviews);
            $('#action').val('update_review');
            $('#rate').val(review_details.rating);
            $('.rateit').rateit('value', review_details.rating)
        } else {
            $('#action').val('send_review');
            $('#review_id').val(0);
            $('#title').val('');
            $('#review_desc').val('');
            $('#rate').val(0);
            $('.rateit').rateit('value', 0)


        }
        $('#product_review').val($data);

        $('#product_id').val(product_id);
    });
    $("#review_form").on('submit', function(event) {
        event.preventDefault();
        var $data = $(this).serialize();
        var url = 'user-orders.php?' + $data;
        $.ajax({
            type: 'GET',
            url: url,
            success: function(output) {
                location.reload();
                $(".modal").modal("hide");

            },
            error: function(output) {
                alert("Not Updated");
            }
        });
    });

    $(".rateit").bind('rated', function(event, value) {
        $('#rate').val(value);
    });
</script>
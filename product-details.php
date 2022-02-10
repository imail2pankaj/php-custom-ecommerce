<?php
include './db/db-connect.php';
include './pages/product-details.php';
include './include/top.php';
?>
<div class="create-body ">
    <div class="form-add">
        <div class="container">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-4">
                    <div class="row ">
                        <div class="col-6 ">
                            <img src="<?= './uploads/products/' . $product_image ?>" width="300px" height="300px">
                        </div>
                        <div class="col-6 border">
                            <p class="mb-0 mt-3"><?= $catogary_name ?></p>
                            <h1 class="fs-30"><?= $product_name ?></h1>
                            <?php
                            if ($selling_price) {
                                echo "<b>$" . $selling_price . "</b>"; ?>
                                <?php echo "&nbsp;<del class='text-muted'> $" . $product_price . "</del>&nbsp;"; ?>
                                <span class="text-success text-decoration-none font-weight-light">
                                    <?php echo (int)(($product_price - $selling_price) * 100 / $product_price) . "%off"; ?></span>
                            <?php } else {
                                echo "$" . $product_price;
                            }
                            ?>
                            <p class="mt-4 "><?= $product_desc ?></p>
                            <div class="text-center">
                                <a class="btn btn-warning mt-5 " href="cart.php?action=add-cart&id=<?= $_GET['id'] ?>"><i class="fa fa-plus"></i> ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6 text-center fw-bold mt-5">
                        <span class=" fs-20">
                            Rating & Reviews
                        </span>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5><?= $row['reviews'] ?></h5>
                                    <h4><?= $row['rating'] ?></h4>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './include/bottom.php'; ?>
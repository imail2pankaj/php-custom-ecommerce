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
                            <img src="<?= './uploads/products/' . $product_image ?>" width="100%" height="100%">
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
                                <a class="btn btn-warning " href="cart.php?action=add-cart&id=<?= $_GET['id'] ?>"><i class="fa fa-plus"></i> ADD TO CART</a>
                                <?php if (in_array($row['id'], wishlistItems())) { ?>
                                    <a class="btn btn-outline-danger" href="wishlist.php?action=remove-wishlist&id=<?= $row['id'] ?>"><i class="fas fa-heart fa-lg"></i> </a>
                                <?php } else { ?>
                                    <a class="btn btn-outline-danger" href="wishlist.php?action=add-wishlist&id=<?= $row['id'] ?>"><i class="far fa-heart fa-lg"></i> </a>
                                <?php }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mb-3">
                    <div class="row text-center mt-2 ">
                        <h2 class="text-secondary">Related Products</h2>
                        <?php while ($row = mysqli_fetch_array($result)) { 
                            // echo "<pre>";print_r($row);exit;
                            ?>
                            <div class="col-4">
                                <div class="card">
                                    <img class="card-img-top" src="<?= './uploads/products/' . $row['product_image'] ?>" alt="..." style="height:150px;width:100%;">
                                    <div class="card-body p-0">
                                        <div class="text-center">
                                            <div class="col-12">
                                                <p class="mb-0 "><?= $catogary_name ?></p>
                                                <a href="product-details.php?id=<?= $row['id'] ?>" class="text-decoration-none text-dark">
                                                    <p class="h5"><?= $row['product_name'] ?></p>
                                                </a>
                                                <?php   
                                                if ($row['selling_price']) {
                                                    echo "<b>$" . $row['selling_price'] . "</b>"; ?>
                                                    <?php echo "&nbsp;<del class='text-muted'> $" . $row['product_price'] . "</del>&nbsp;"; ?>
                                                    <span class="text-success text-decoration-none font-weight-light">
                                                        <?php echo (int)(($row['product_price'] - $row['selling_price']) * 100 / $row['product_price']) . "%off"; ?></span>
                                                <?php } else {
                                                    echo "$" . $row['product_price'];
                                                }
                                                ?>
                                                <p class="mt-4 "><?= $row['product_desc'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer pt-0 border-top-0 bg-transparent">
                                        <a class="btn btn-warning " href="cart.php?action=add-cart&id=<?= $row['id'] ?>"><i class="fa fa-plus"></i> ADD TO CART</a>
                                        <?php if (in_array($row['id'], wishlistItems())) { ?>
                                            <a class="btn btn-outline-danger " href="wishlist.php?action=remove-wishlist&id=<?= $row['id'] ?>"><i class="fas fa-heart fa-lg"></i> </a>
                                        <?php } else { ?>
                                            <a class="btn btn-outline-danger " href="wishlist.php?action=add-wishlist&id=<?= $row['id'] ?>"><i class="far fa-heart fa-lg"></i> </a>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 border fw-bold p-3">
                        <span class="fs-20"><i class="fas fa-star"></i>
                            Rating & Reviews
                        </span>
                        <?php while ($row = mysqli_fetch_assoc($review_rating)) {
                            // print_r($row); 
                        ?>
                            <div class="">
                                <h4 class="mt-3 btn btn-success btn-sm"><?= $row['rating'] ?> <i class="fas fa-star fa-sm"></i></h4> <span class="p-1"> <?= $row['review_title'] ?></span>
                                <h6 class="fw-lighter"><?= $row['reviews'] ?></h6>
                                <h6 class="text-muted"><?= $row['first_name'] ?></h6>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './include/bottom.php'; ?>
<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/search.php';
?>

<div class="container">
    <div class="text-center">
        <div class="row">
            <?php
            if ($message) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?= $message ?>
                </div>
            <?php }
            ?>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                if ($row) { ?>
                    <div class="card mt-3 border-warning m-2 p-0" style="width: 13rem;height:22rem;">
                        <img src="<?= './uploads/products/' . $row['product_image'] ?>" class="mb-0 " alt="Card image cap" style="height:210px;width:206px">
                        <div class="card-body pt-0">
                            <h5 class="card-title"><?php echo $row['product_name'];  ?></h5>
                            <p class="card-text"><?php echo $row['catogary_name']; ?></p>
                            <p class="card-text">
                                <?php if ($row['selling_price']) {
                                    echo "<b>$" . $row['selling_price'] . "</b>"; ?>
                                    <?php echo "&nbsp;<del class='text-muted'> $" . $row['product_price'] . "</del>&nbsp;"; ?>
                                    <span class="text-success text-decoration-none font-weight-light">
                                        <?php echo (int)(($row['product_price'] - $row['selling_price']) * 100 / $row['product_price']) . "%off "; ?></span>
                                <?php
                                } else {
                                    echo "$" . $row['product_price'];
                                } ?>
                            </p>
                            <div>
                                <a class="btn btn-warning" style="margin-left:-8px;" href="cart.php?action=add-cart&id=<?= $row['id'] ?>"><i class="fa fa-plus"></i> ADD TO CART</a>
                                <div style="float: right;">
                                    <?php if (in_array($row['id'], wishlistItems())) { ?>
                                        <a class="btn btn-outline-danger btn-sm mt-1" href="wishlist.php?action=remove-wishlist&id=<?= $row['id'] ?>"><i class="fas fa-heart fa-lg"></i> </a>
                                    <?php } else { ?>
                                        <a class="btn btn-outline-danger btn-sm mt-1 " href="wishlist.php?action=add-wishlist&id=<?= $row['id'] ?>"><i class="far fa-heart fa-lg"></i> </a>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } else { ?>
                    <script>
                        alert("No result found ")
                    </script>
            <?php }
            } ?>
        </div>
    </div>
</div>
<?php include 'include/bottom.php'; ?>
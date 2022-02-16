<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/search.php';
?>
<form id="search_form" method="GET">
    <input type="hidden" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : "" ?>">
    <div class="container">
        <div>
            <div class="row">
                <?php
                if ($message) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $message ?>
                    </div>
                <?php }
                ?>
                <div class="col-3 mt-3 border">
                    <ul class="p-0 list-unstyled m-2"><span class="fs-20 text-primary"> Categories</span>
                        <?php while ($row = mysqli_fetch_array($catogary)) { ?>
                            <li>
                                <div class="form-check">
                                    <input type="hidden" id="filter_id">
                                    <input class="category_id form-check-input" type="checkbox" value="<?= $row['id'] ?>" name="category_id[]" id="checkbox" <?php echo in_array($row['id'], $catogary_id) ? 'checked' : "" ?>>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?= $row['catogary_name']; ?>
                                    </label>
                                </div>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
                <div class="col-9 mt-3 border">
                    <div class="row mb-2">
                        <?php
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_array($result)) {  ?>
                                <div class="col-4 mt-3">
                                    <div class="card mt-3 border-warning p-0">
                                        <img src="<?= './uploads/products/' . $row['product_image'] ?>" class="mb-0 " alt="Card image cap" style="height:210px;width:100%">
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
                                                <a class="btn btn-warning btn-sm" href="cart.php?action=add-cart&id=<?= $row['id'] ?>"><i class="fa fa-plus"></i> ADD TO CART</a>
                                                <div style="float: right;">
                                                    <?php if (in_array($row['id'], wishlistItems())) { ?>
                                                        <a class="btn btn-outline-danger btn-sm" href="wishlist.php?action=remove-wishlist&id=<?= $row['id'] ?>"><i class="fas fa-heart fa-lg"></i> </a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-outline-danger btn-sm " href="wishlist.php?action=add-wishlist&id=<?= $row['id'] ?>"><i class="far fa-heart fa-lg"></i> </a>
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }  ?>
                        <?php } else { ?>
                            <div class="text-center my-4 fs-20 border p-3">
                                <?php echo "No results found"; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include 'include/bottom.php'; ?>
<script>
    $(document).on('change', '.category_id', function() {
        $('form#search_form').submit();
    });
</script>
<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/wishlist.php';
?>
<div class="container">
    <div class="col-12 mt-3 ">
        <h6> <i class="fas fa-arrow-circle-left pe-auto" style="margin-top: 13px;" onclick="history.go(-1);"></i></h6>
        <h3><i class="fas fa-heart"></i> Wishlist </h3>
        <div class="row">
            <div class="col-12 ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($show)) {
                        ?>
                            <tr>
                                <td scope="row"><img src="<?= './uploads/products/' . $row['product_image'] ?>" alt="img" width="80px;" height="50px;"></td>
                                <td scope="row"><?= $row['product_name'] ?></td>
                                <td scope="row">
                                    <?php
                                    if ($row['selling_price']) {
                                        echo "<b>$" . $row['selling_price'] . "</b>"; ?>
                                        <?php echo "&nbsp;<del class='text-muted'> $" . $row['product_price'] . "</del>&nbsp;"; ?>
                                        <span class="text-success text-decoration-none font-weight-light">
                                            <?php echo (int)(($row['product_price'] - $row['selling_price']) * 100 / $row['product_price']) . "%off "; ?></span>
                                    <?php
                                    } else {
                                        echo "$" . $row['product_price'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-outline-danger" href="wishlist.php?action=remove-wishlist&id=<?= $row['id'] ?>">Remove</a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
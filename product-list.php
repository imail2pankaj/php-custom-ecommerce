<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/product-list.php';
?>

<div class="container">
    <div class="row">
        <div class="col-6 mt-3">
            <h2>Products</h2>
        </div>
        <div class="col-6 mt-3 text-end"><a href="product-add.php" class="btn btn-secondary">Add Product</a></div>
    </div>
    <?php
    if ($message) {
    ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= $message ?>
        </div>
    <?php }
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td scope="row"><?= $row['id'] ?></td>
                    <td scope="row"><?= $row['product_name'] ?></td>
                    <td scope="row"><img src="./uploads/products/<?= $row['product_image'] ?>" alt="" width="50px"></td>
                    <td scope="row"><?= $row['catogary_name'] ?></td>
                    <td scope="row">
                        <?= $row['product_price'] ?>
                        <?= $row['selling_price']  ?>
                    </td>
                    <td scope="row"><?= $row['status'] == 0 ? 'InActive':'Active' ?> </td>
                    <td scope="row"><?= formattedDateTime($row['created_at']) ?> </td>
                    <td>
                        <a class="btn btn-primary m-1" href="Product-update.php?id=<?= $row['id'] ?>">Edit</a>
                        <a class="btn btn-danger" href="Product-list.php?id=<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'include/bottom.php'; ?>
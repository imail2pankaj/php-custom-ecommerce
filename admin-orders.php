<?php
include './db/db-connect.php';
include './pages/admin-orders.php';
include './include/top.php';
?>
<div class="container">
    <div class="row">
        <div class="col-6 mt-3">
            <h2>Orders</h2>
        </div>
    </div>
    <?php
    if ($message) {
    ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= $message ?>
        </div>
    <?php }
    ?>
    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td scope="row"><?= $row['order_id'] ?></td>
                    <td scope="row"><?= $row['name'] ?></td>
                    <td scope="row"><?= $row['phone'] ?></td>
                    <td scope="row"><?= $row['city'] ?></td>
                    <td scope="row"><?= $row['totalprice'] ?></td>
                    <td scope="row"><?= orderStatus($row['order_status']) ?> </td>
                    <td scope="row"><?= formattedDateTime($row['created_at']) ?> </td>
                    <td>
                        <a class="btn btn-primary m-1" href="#?id=<?= $row['id'] ?>">View</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'include/bottom.php'; ?>
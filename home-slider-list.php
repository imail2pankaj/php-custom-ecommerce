<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/home-slider-list.php';
?>

<div class="container">
    <div class="row">
        <div class="col-6 mt-3">
            <h2>Home slides</h2>
        </div>
        <div class="col-6 mt-3 text-end"><a href="home-slider-add.php" class="btn btn-secondary">Add Slides</a></div>
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
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td scope="row"><?= $row['id'] ?></td>
                    <td scope="row"><img src="./uploads/slides/<?= $row['slider_image'] ?>" alt="img" width="50px"></td>
                    <td scope="row"><?= $row['slider_name'] ?></td>
                    <td scope="row"><?= formattedDateTime($row['created_at']) ?> </td>
                    <td>
                        <a class="btn btn-primary m-1" href="home-slider-update.php?id=<?= $row['id'] ?>">Edit</a>
                        <a class="btn btn-danger" href="home-slider-list.php?id=<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'include/bottom.php'; ?>
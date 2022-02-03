<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/success.php';
?>
<div class="container">
    <div class="row ">
        <div class="text-right">
            <a href="index.php" class="mt-5">Back to Home</a>
        </div>
        <div class="text-center mt-5">
            <?php if ($message) { ?>
                <b class="alert alert-success"> <?= $message ?></b>
            <?php } else if ($failuremessage) { ?>
                <b class="alert alert-danger"><?= $failuremessage ?></b>
            <?php } ?>

        </div>

    </div>
</div>
<?php
include './db/db-connect.php';
include './pages/payment.php';
include './include/top.php';
?>
<div class="create-body ">
    <div class="form-add">
        <div class="container">
            <div class="row">
                <div class="col-8 mt-3 ">
                    <h6> <i class="fas fa-arrow-circle-left m-1" onclick="history.go(-1);"></i></h6>
                    <h4 class="text-success">Order Placed Successfully</h4>
                    <a href="index.php" class="text-decoration-none">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
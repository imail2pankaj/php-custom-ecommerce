<?php
include './db/db-connect.php';
include './pages/registration.php';
include './include/top.php';
?>

<div class="signin-body ">
    <div class="form-signup">
        <form class="row g-3" method="post">
            <?php
            if ($message) {
            ?>
                <div class="alert alert-primary" role="alert">
                    <?= $message ?>
                </div>
            <?php }
            ?>
            <h1 class="h3 mb-3 fw-normal">User Registration</h1>
            <div class="col-12">
                <label for="inputAddress" class="form-label">First name</label><span class="text-danger">*</span>
                <input type="text" class="form-control" id="inputAddress" placeholder="Enter First Name" name="first_name" autofocus>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Last name</label><span class="text-danger">*</span>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Enter Last Name" name="last_name">
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label><span class="text-danger">*</span>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Enter Email" name="email">
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label><span class="text-danger">*</span>
                <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Enter Password">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Date of Birth</label><span class="text-danger">*</span>
                <input type="date" class="form-control" id="inputdate" name="dob">
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="i_agree" value="1" id="gridCheck"><span class="text-danger">*</span>
                    <label class="form-check-label" for="gridCheck">
                        I agree with terms.
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="reg">Register</button>
                <a class="btn btn-primary" href="index.php">Cancel</a>
            </div>

            <div class="modal-body p-5 pt-0">
                <small class="text-muted">By clicking Register, you agree to the terms of use.</small>
            </div>
        </form>
    </div>
</div>
<link href="css/signin.css" rel="stylesheet">
<?php
include './include/bottom.php';

?>
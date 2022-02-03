<?php
include './db/db-connect.php';
include './pages/users-update.php';
include './include/top.php';
?>
<div class="create-body ">
    <div class="form-update">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
                    <h2>Update User</h2>
                </div>
            </div>
            <form method="post">

                <div class="row w-50">

                    <?php
                    if ($message) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $message ?>
                        </div>
                    <?php }
                    ?>
                </div>

                <div class="row">
                    <div class="col-6 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">First Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputtext" name="first_name" placeholder="Enter First Name" value="<?= $row['first_name']; ?>" autofocus>
                    </div>

                    <div class="col-6 mb-3 mt-2">
                        <label for="exampleInputtext" class="form-label">Last Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputtext" name="last_name" placeholder="Enter Last Name" value="<?= $row['last_name']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" value="<?= $row['email']; ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password">
                    </div>

                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="inputAddress2" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="inputdate" name="dob" value="<?= $row['dob']; ?>">
                    </div>

                    <div class="col-6 mb-3">
                        <label for="exampleInputtext" class="form-label">Height</label>
                        <input class="form-control" type="number" placeholder="Height in cm" name="height" placeholder="Enter Height" value="<?= $row['height']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="form-check-label" class="form-label d-block">Gender<span class="text-danger">*</span></label>
                        <input class="form-check-input" type="radio" name="gender" value="Male" <?= $row['gender'] == 'Male' ? 'checked' : "" ?>>
                        <label class="form-check-label" for="flexRadioDefault1">Male
                        </label>
                        <input class="form-check-input" type="radio" name="gender" <?= $row['gender'] == 'Female' ? 'checked' : "" ?>>
                        <label class="form-check-label" for="flexRadioDefault2" value="Female">Female
                        </label>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="form-check-label" class="form-label d-block">User type<span class="text-danger">*</span></label>
                        <input class="form-check-input" type="radio" name="user_type" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">Admin
                        </label>
                        <input class="form-check-input" type="radio" name="user_type" value="2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">User
                        </label>
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <label for="form-check-label" class="form-label d-block">Status<span class="text-danger">*</span></label>
                    <input class="form-check-input" type="radio" name="status" value="active" <?= $row['status'] == 'active' ? 'checked' : "" ?>>
                    <label class="form-check-label" for="flexRadioDefault1">Active</label>
                    <input class="form-check-input" type="radio" name="status" value="inactive" <?= $row['status'] == 'inactive' ? 'checked' : "" ?>>
                    <label class="form-check-label" for="flexRadioDefault2">Inactive</label>
                </div>

                <button type="submit" class="btn btn-primary" name="update">Submit</button>
                <a class="btn btn-secondary" href="users-list.php">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include './include/bottom.php'; ?>
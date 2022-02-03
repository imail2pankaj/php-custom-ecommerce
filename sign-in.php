<?php
include './db/db-connect.php';
is_loggedin();
include './pages/signin.php';
include './include/top.php';

?>

<div class="signin-body text-center">
  <div class="form-signin">
    <form method="post">
      <?php
      if ($message) {
      ?>
        <div class="alert alert-secondary" role="alert">
          <?= $message ?>
        </div>
      <?php }
      ?>
      <div class="modal-body p-5 pt-0">
        <form class="">
          <h2 class="fw-bold mb-4">Sign in for free</h2>
          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-5" id="floatingInput" placeholder="name@example.com" name="email" autofocus>
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-secondary" type="submit" name="signin">Sign in</button>
          <small class="text-muted">By clicking Sign in, you agree to the terms of use.</small>
          <hr class="my-4">
          <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2>
          <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-4" type="submit">
            <svg class="bi me-1" width="16" height="16">
              <use xlink:href="#twitter" />
            </svg>
            Sign in with Twitter
          </button>
          <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-4" type="submit">
            <svg class="bi me-1" width="16" height="16">
              <use xlink:href="#facebook" />
            </svg>
            Sign in with Facebook
          </button>
          <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-4" type="submit">
            <svg class="bi me-1" width="16" height="16">
              <use xlink:href="#github" />
            </svg>
            Sign in with GitHub
          </button>
        </form>
      </div>
  </div>
</div>
</div>

<link href="css/signin.css" rel="stylesheet">
<?php include './include/bottom.php'; ?>
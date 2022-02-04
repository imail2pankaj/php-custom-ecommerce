<!doctype html>
<html lang="en">
<link rel="shortcut icon" href="favicon/desktop-solid.svg" type="image/x-icon">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Registration Page</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/slick.css">
  <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
</head>

<body>
  <header class="site-header sticky-top py-1">
    <nav class="container d-flex flex-column flex-md-row justify-content-between">
      <a class="py-2 d-none d-md-inline-block" href="index.php">Home</a>
      <a class="py-2 d-none d-md-inline-block" href="aboutus.php">About Us</a>
      <a class="py-2 d-none d-md-inline-block" href="contactus.php">Contact us</a>



      <?php
      // echo $_SESSION['user_type'];
      if (!isset($_SESSION['email'])) { ?>
        <a class="btn btn-secondary" href="sign-in.php" role="button">Login</a>
        <a class="btn btn-secondary" href="registration.php" role="button">Registration</a>
      <?php }
      ?>
      <div class="row">
        <form method="GET" action="search.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : "" ?>">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>
      </div>
      <a class="m-2" href="cart.php"><i class="fa fa-shopping-cart"></i> (<?= cartCounter(); ?>)</a>
      <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
      ?>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-user-circle"></i> <?php echo $_SESSION['first_name'] ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="home-slider-list.php"><i class="fas fa-sliders-h"></i> Home slides</a></li>
          <li><a class="dropdown-item" href="users-list.php"><i class="fas fa-user"></i> User</a></li>
          <li><a class="dropdown-item" href="catogary-list.php"><i class="fas fa-folder"></i> Catogary</a></li>
          <li><a class="dropdown-item" href="product-list.php"><i class="fab fa-microsoft"></i> Product</a></li>
          <li><a class="dropdown-item" href="admin-orders.php"><i class="fa fa-wallet"></i> Orders</a></li>
          <li><a class="dropdown-item" href="Logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      <?php } ?>
      <?php

      if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 2) {
      ?>

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['first_name']; ?></a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="user-orders.php"><i class="fa fa-wallet"></i> Orders</a></li>
          <li><a class="dropdown-item" href="wishlist.php"><i class="fas fa-heart"></i> Wishlist</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa fa-bell"></i> Notifications</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa fa-cogs"></i> Settings</a></li>
          <li><a class="dropdown-item" href="Logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      <?php } ?>
    </nav>
  </header>
  <main>
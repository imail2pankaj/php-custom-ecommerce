<?php
include './db/db-connect.php';
include './include/top.php';
is_loggedin();
include './pages/home-slider-list.php';
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php $slide_counter = 0;
    while ($row = mysqli_fetch_array($result)) {
    ?>
      <div class="carousel-item <?= $slide_counter == 0 ? 'active' : "" ?>">
        <img src="./uploads/slides/<?= $row['slider_image'] ?>" class="d-block w-100 " alt="Image not found" height="580px">
        <div class="carousel-caption d-none d-md-block text-center">
          <h5 class="h3"><?= $row['slider_name'] ?></h5>
          <p class="h4"><?= $row['description'] ?></p>
        </div>
      </div>
    <?php
      $slide_counter++;
    } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container">
  <div class="row text-center mt-2 ">
    <h2 class="text-secondary">Popular Products
    </h2>
  </div>
  <div class="text-center">
    <section class="regular slider mt-">
      <?php
      for ($i = 0; $i < count($popularProducts); $i++) { ?>
        <div>
          <div style="height: 150px;width: 200px;">
            <img src="<?= './uploads/products/' . $popularProducts[$i]['product_image'] ?>" style="height:90%;width: 98%;">
          </div>
          <a href="product-details.php?id=<?= $popularProducts[$i]['id'] ?>" class="text-decoration-none text-dark">
            <p class="h4"><?= $popularProducts[$i]['product_name'] ?></p>
          </a>
          <p>
            <?= $popularProducts[$i]['catogary_name'] ?><br>
            <?php
            if ($popularProducts[$i]['selling_price']) {
              echo "<b>$" . $popularProducts[$i]['selling_price'] . "</b>"; ?>

              <?php echo "<del class='text-muted'> $" . $popularProducts[$i]['product_price'] . "</del>"; ?>
              <span class="text-success text-decoration-none font-weight-light">
                <?php echo (int)(($popularProducts[$i]['product_price'] - $popularProducts[$i]['selling_price']) * 100 / $popularProducts[$i]['product_price']) . "%off "; ?></span>
            <?php
            } else {
              echo "$" . $popularProducts[$i]['product_price'];
            }
            ?>
          </p>
          <div class="text-center border-danger mb-1">
            <a class="btn btn-warning" href="cart.php?action=add-cart&id=<?= $popularProducts[$i]['id'] ?>"><i class="fa fa-plus"></i> ADD TO CART</a>
          </div>
        </div>
      <?php } ?>
    </section>
  </div>
</div>
<?php include 'include/bottom.php'; ?>
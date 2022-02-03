<?php
include './db/db-connect.php';
include './include/top.php';
?>
<div class="container">
  <div class="row mt-5">
    <div class="col-4"><i class="fas fa-home"></i>Address:
      Plot No 387, Banjara Hills,
      Hyderabad ,
      Andhra Pradesh. <br>
      India. <br><br>
      <i class="fas fa-phone-alt"></i> <a href="tel:04023548291">04023548291</a><br><br>
      Email:<br><i class="fas fa-envelope"></i> <a href="mailto:Support@example.com">Support@example.com</a>
    </div>

    <div class="col-8 ">
      <div class="email-box">
        <p>Fill out your details in the form </p>
        <form action="#" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="form-group mt-3 col-4">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name*" required autofocus>
            </div>
            <div class="form-group mt-3 col-4">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email*" required>
            </div>
            <div class="form-group mt-3 col-4">
              <input type="text" class="form-control" name="website" id="website" placeholder="Your Website" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" id="message" rows="5" placeholder="Your Message*" required></textarea>
            </div>
          </div>
          <button class="btn btn-success mt-2" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>



<?php
include './include/bottom.php';
?>
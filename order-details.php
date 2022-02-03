<?php
include './db/db-connect.php';
include './pages/order-details.php';
include './include/top.php';
?>
<div class="container">
    <div class="row">
        <div class="col-8 mt-3 ">
            <h6> <i class="fas fa-arrow-circle-left m-1" onclick="history.go(-1);"></i></h6>
            <div class="border p-3">
                <h4 class="fs-18 text-primary bg-secondary p-2 text-dark"> Delivery Address</h4>
                <?php
                $row = mysqli_fetch_array($result) ?>
                <div class="m-2">
                    <h4 style="font-weight:normal;"><?= $row['name'] ?></h4>
                </div>
                <div class="m-2">
                    <h6 style="font-size: 15px;"><?= "Phone : " . $row['phone'] ?></h6>
                </div>
                <div class="m-2">
                    <h6 style="font-size: 15px;"><?= "Address : " . $row['address'] ?></h6>
                </div>
            </div>
            <div class="border  p-3">
                <h4 class="fs-18 text-primary bg-secondary p-2 text-dark"> Order Summary</h4>
                <div>
                    <?php
                    $price = 0;
                    foreach ($cartItems as $cart) { ?>
                        <img src="<?= './uploads/products/' . $cart->product->product_image ?>" alt="img" width="80px;" height="50px;" class="m-2">
                        <div class="m-2">
                            <h4 style="font-weight:normal;"><?= $cart->product->product_name ?></h4>
                        </div>
                        <div class="m-2">
                            <?php
                            if ($cart->product->selling_price) {
                                echo "<b>$" . $cart->product->selling_price . "</b>"; ?>
                                <?php echo "&nbsp;<del class='text-muted'> $" . $cart->product->product_price . "</del>&nbsp;"; ?>
                                <?php echo (int)(($cart->product->product_price - $cart->product->selling_price) * 100 / $cart->product->product_price) . "%off "; ?></span>
                                <?php $price = ($cart->quantity * $cart->product->selling_price) + $price ?>
                            <?php
                            } else {
                                echo "$" . $cart->product->product_price;
                                $price = ($cart->quantity * $cart->product->product_price) + $price;
                            }
                            ?>
                            <div class="m-2">
                                <?= "<b>Quantity</b> : " . $cart->quantity ?>
                                <?= "<b>Total Price : " . $price . "</b>" ?>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
        <div class="border col-4 mt-5">
            <table class="table">
                <th style="width: 100%;">
                    <h4 class="fs-18 m-2">Price Details</h4>
                </th>
                <tr>
                    <td>
                        <h6 class="d-inline" style="font-weight: normal;">Price</h6>
                    </td>
                    <td>
                        <span><?php echo "$" .$price ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6 style="font-weight: normal;">Items</h6>
                    </td>
                    <td>
                        <span><?= cartCounter(); ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span>Delivery Charges</span>
                    </td>
                    <td>
                        <span class="text-success"> FREE</span>
                    </td>
                </tr>

                <td>
                    <h4 style="font-weight: normal;"> Total Amount</h4>
                </td>
                <td>
                    <span><b> <?php echo "$" . $price; ?></b> </span>
                </td>
                <tr>
                    <td>
                        <form action="payment.php" method="post">
                            <input type="hidden" name="address_id" value="<?= $_GET['address_id'] ?>">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $Publishablekey ?>" price="<?php echo $price ?>" name="<?php echo $_SESSION['first_name'] ?>" email="<?php echo $_SESSION['email'] ?>" data-description="" data-image="https://www.clipartmax.com/png/small/100-1005846_waiter-free-icon-avatar-profile-circle-png.png" data-currency="USD">
                            </script>
                        </form>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    <?php include './include/bottom.php'; ?>
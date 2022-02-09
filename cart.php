<?php
include './db/db-connect.php';
include './pages/cart.php';
include './include/top.php';
?>
<div class="container">
    <div class="col-12 mt-3 ">
        <h6> <i class="fas fa-arrow-circle-left pe-auto" style="margin-top: 13px;" onclick="history.go(-1);"></i>
            <h3><i class="fa fa-shopping-cart"></i> Cart </h3>
            <?php if (cartCounter()) {
            ?>
                <div class="row">
                    <div class="col-8 ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $price = 0;
                                foreach ($cartItems as $cart) { ?>
                                    <tr>
                                        <td scope="row"><img src="<?= './uploads/products/' . $cart->product->product_image ?>" alt="img" width="80px;" height="50px;"></td>
                                        <td scope="row"><?= $cart->product->product_name ?></td>
                                        <td scope="row">
                                            <?php
                                            if ($cart->product->selling_price) {
                                                echo "<b>$" . $cart->product->selling_price . "</b>"; ?>
                                                <?php echo "&nbsp;<del class='text-muted'> $" . $cart->product->product_price . "</del>&nbsp;"; ?>
                                                <span class="text-success text-decoration-none font-weight-light">
                                                    <?php echo (int)(($cart->product->product_price - $cart->product->selling_price) * 100 / $cart->product->product_price) . "%off "; ?></span>
                                                <?php $price = ($cart->quantity * $cart->product->selling_price) + $price ?>
                                            <?php
                                            } else {
                                                echo "$" . $cart->product->product_price;
                                                $price = ($cart->quantity * $cart->product->product_price) + $price;
                                            }
                                            ?>
                                        </td>
                                        <td scope="row">
                                            <form action="cart.php" name="update_<?= $cart->id ?>" method="get">
                                                <input type="hidden" name="action" value="update-cart">
                                                <input type="hidden" name="id" value="<?= $cart->id ?>">
                                                <input type="number" step="1" name="quantity" class="form-control d-inline-block" style="width: 80px;" value="<?= $cart->quantity ?>">
                                                <button type="submit" name="btn_<?= $cart->id ?>" class="btn btn-outline-primary"><i class="fas fa-pen" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-danger" href="cart.php?action=remove-cart&id=<?= $cart->id ?>">Remove</a>
                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                        <tr>
                            <td>
                                <?php
                                if (isset($_SESSION['userid'])) { ?>
                                    <a href="check-out.php" class="btn btn-warning btn-lg" style="float:right">Check out</a>
                                <?php } else { ?>
                                    <a href="sign-in.php?redirect=check-out.php" class="btn btn-warning btn-lg" style="float:right">Check out</a>
                                <?php } ?>
                            </td>
                        </tr>
                    </div>
                    <div class="border col-4">
                        <table class="table">
                            <th style="width: 100%;">
                                <h5 class="text-secondary ">Price Details</h5>
                            </th>
                            <tr>
                                <td>
                                    <h5 class="d-inline" style="font-weight: normal;">Price</h5>
                                </td>
                                <td>
                                    <span><?php echo "$" . $price ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 style="font-weight: normal;">Items</h5>
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
                                <span><b> <?php echo  "$" . $price; ?></b> </span>
                            </td>
                        </table>
                    </div>
                </div>
            <?php } else {
                echo "Your Cart is empty";
            } ?>
    </div>
</div>
<?php include './include/bottom.php'; ?>
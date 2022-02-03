<?php include '/xampp/htdocs/php-task/stripe/config.php';
//  echo "<pre>" ; print_r($_POST);
if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);

    $token = $_POST['stripeToken'];
    $data = \Stripe\Charge::create(array(
        "amount" => 10000,
        "currency" => "USD",
        "description" => "My php-task",
        "source" => $token
    ));

    // echo "<pre>";
    // print_r($data);
}
?>
<a href="index.php">Back</a>
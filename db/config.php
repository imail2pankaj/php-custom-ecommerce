<?php
$server_name ="localhost";
$username = "root";
$password = "";
$db_name = "php_custom_ecommerce";

require './stripe/stripe-php-master/init.php';
$Publishablekey ="pk_test_51JaPaLFy07oVpwvgqV486jq5TEcNQTqvurzjOChGIuEy1dpH0DBf4Dtxpn77y9TPkP5tpCEEsGmM8P5yhULTJMQe00XW6Nmhlt";
$Secretkey = "sk_test_51JaPaLFy07oVpwvg2yqnEEh3kf5PtRQiBI3uu5bt3gbP2hK7ze1kmu2csxRnA742n9FkXBEQJBUyGSUUQtfB628N00ZgoC2mix";

\Stripe\Stripe::setApiKey($Secretkey);
?>
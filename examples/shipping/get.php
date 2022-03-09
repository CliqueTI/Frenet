<?php

require __DIR__."/../../vendor/autoload.php";

use CliqueTI\Frenet\Shipping;
use CliqueTI\Frenet\Enums\Environment;

$shipping = new Shipping(Environment::SANDBOX,'SEU TOKEN',false);
$shipping->get();

var_dump($shipping->response(), $shipping->error());
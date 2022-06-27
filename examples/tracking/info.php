<?php

require __DIR__."/../../vendor/autoload.php";

use CliqueTI\Frenet\Tracking;
use CliqueTI\Frenet\Enums\Environment;

/* DADOS PARA CALCULO DO FRETE */
$data = array(
    "ShippingServiceCode" => "03220",
    "TrackingNumber" => "CodCorreios",
);

$tracking = new Tracking(Environment::PRODUCTION, 'SEU TOKEN',false);
$tracking->info($data);

var_dump($tracking->response());
var_dump($tracking->error());
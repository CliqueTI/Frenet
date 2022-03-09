<?php

require __DIR__."/../../vendor/autoload.php";

use CliqueTI\Frenet\Cep;
use CliqueTI\Frenet\Enums\Environment;

$cep = new Cep(Environment::SANDBOX, 'SEU TOKEN',false);
$cep->get('01001001');

var_dump($cep->response(), $cep->error());
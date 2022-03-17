<?php

require __DIR__."/../../vendor/autoload.php";

use CliqueTI\Frenet\Shipping;
use CliqueTI\Frenet\Enums\Environment;

/* DADOS PARA CALCULO DO FRETE */
$data = array(
    'SellerCEP'             => '01001001', //CEP VENDEDOR (OBRIGATORIO)
    'RecipientCEP'          => '08499999', //CEP CLIENTE (OBRIGATORIO)
    'ShipmentInvoiceValue'  => '120.00', //VALOR DA NOTA (OBRIGATORIO) - FLOAT
    'ShippingServiceCode'   => null, //CODIGO (OPCIONAL)
    'ShippingItemArray'     => [
        [
            'Height'    => '4', //ALTURA EM CM (OBRIGATORIO)
            'Length'    => '35', //COMPRIMENTO EM CM (OBRIGATORIO)
            'Quantity'  => '1', //QUANTIDADE (OBRIGATORIO)
            'Weight'    => '1', //PESO KG (OBRIGATORIO)
            'Width'     => '25', //LARGURA (OBRIGATORIO)
            'SKU'       => '010001', //CODIGO DE BARRAS (OPCIONAL)
            'Category'  => 'Papelaria' //CATEGORIA (OPCIONAL)
        ]
    ],
    'RecipientCountry'      =>'BR' //PAIS DO CLIENTE (OBRIGATORIO)
);

$shipping = new Shipping(Environment::SANDBOX, 'SEU TOKEN',false);
$shipping->calculate($data);

var_dump($shipping->response());
var_dump($shipping->error());
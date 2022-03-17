<?php

namespace CliqueTI\Frenet\Enums;

/**
 * ENDEREÇOS DA FRENET
 * FRENET URL'S
 */
class BaseUrl {

    /** @var string[]  */
    const BASEURLS = [
        'production' => 'api.frenet.com.br',
        'sandbox' => 'private-anon-9871ce117a-frenetapi.apiary-proxy.com',
    ];

    /** @var string  */
    const PRODUCTION = self::BASEURLS['production'];

    /** @var string  */
    const SANDBOX = self::BASEURLS['sandbox'];

}
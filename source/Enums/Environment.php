<?php

namespace CliqueTI\Frenet\Enums;

/**
 *  DEFINIÇÃO DO AMBIENTE
 *  Setting Environment
 */
class Environment {

    /** @var string  */
    const PRODUCTION = 'production';

    /** @var string  */
    const SANDBOX = 'sandbox';

    /** @var string[] */
    const ENVIRONMENTS = [
        self::PRODUCTION,
        self::SANDBOX
    ];

}
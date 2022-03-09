<?php

namespace CliqueTI\Frenet;

/**
 *  Class Cep
 * @package CliqueTI\Frenet
 */
class Cep extends Frenet {

    /**
     * GET ADDRESS BY POSTALCODE
     * @param string $cep
     * @return $this
     */
    public function get(string $cep): Cep {
        $this->request("CEP/Address/{$cep}",'GET');
        return $this;
    }

    /**
     * @return string|null
     */
    public function error():?string {
        if($this->response()->Message != "ok"){
            return $this->response()->Message;
        }
        return null;
    }

}
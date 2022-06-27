<?php

namespace CliqueTI\Frenet;

/**
 *  Class Tracking
 * @package CliqueTI\Frenet
 */
class Tracking extends Frenet {

    /**
     * RETORNA AS INFORMAÇÕES DE RASTREIO (Get Tracking Info)
     * @param array|null $fields
     * @return $this
     */
    public function info(array $fields=null): Tracking {
        /* HEADER */
        $this->header('Content-Type','application/json');

        /* Fields */
        $this->fields($fields,'json');

        /* Request */
        $this->request('tracking/trackinginfo', 'POST');

        return $this;
    }

    /**
     * @return string|null
     */
    public function error():?string {
        /* When Null */
        if(empty($this->response())){
            return "Nenhum dado foi retornado.";
        }
        if(!empty($this->response()->ErrorMessage)){
            return $this->response()->ErrorMessage;
        }
        return null;
    }

}
<?php

namespace CliqueTI\Frenet;

/**
 *  Class Shipping
 * @package CliqueTI\Frenet
 */
class Shipping extends Frenet {

    /**
     * RETORNA OPCOES DE FRETE DISPONIVEIS
     * @return $this
     */
    public function get(): Shipping {
        /* Request */
        $this->request("shipping/info",'GET');

        return $this;
    }

    /**
     * NOVO CALCULO DE FRETE
     * @param array|null $fields
     * @return $this
     */
    public function calculate(array $fields=null): Shipping {
        /* HEADER */
        $this->header('Content-Type','application/json');

        /* Fields */
        $this->fields($fields,'json');

        /* Request */
        $this->request('shipping/quote', 'POST');

        return $this;
    }

    /**
     * @return string|null
     */
    public function error():?string {
        if(property_exists($this->response(), 'Message') && $this->response()->Message != ""){
            return $this->response()->Message;
        }
        return null;
    }

}
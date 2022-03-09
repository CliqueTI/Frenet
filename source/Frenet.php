<?php

namespace CliqueTI\Frenet;

use CliqueTI\Frenet\Enums\BaseUrl;
use CliqueTI\Frenet\Interfaces\Resources;

/**
 * Class Frenet
 * @package CliqueTI\Frenet
 */
abstract class Frenet implements Resources {

    /** @var string $apiUrl */
    private $apiUrl;

    /** @var string $endPoint */
    private $endPoint;

    /** @var string $method */
    private $method;

    /** @var array $headers */
    private $headers;

    /** @var array|null $fields */
    private $fields;

    /** @var mixed $response */
    private $response;

    /** @var bool $sslVerifypeer */
    private $sslVerifypeer;

    /**
     * Frenet constructor.
     * @param string $apiUrl
     * @param string $token
     * @param bool $sslVerifypeer
     */
    public function __construct(string $environment, string $token, bool $sslVerifypeer = true) {
        $this->apiUrl = BaseUrl::BASEURLS[$environment];
        $this->sslVerifypeer = $sslVerifypeer;
        $this->headers([
            "Accept" => "application/json",
            "token" => $token
        ]);
    }

    /**
     * @param array|null $headers
     */
    protected function headers(?array $headers):void {
        if(!$headers){return;}
        foreach ($headers as $k => $v) {
            $this->header($k,$v);
        }
    }

    /**
     * @param string $key
     * @param string|null $value
     */
    protected function header(string $key, string $value=null):void {
        $this->headers[] = "{$key}: {$value}";
    }

    /**
     * @param array|null $fields
     * @param string $format
     */
    protected function fields(?array $fields, string $format="json"): void {
        if($format == "json") {
            $this->fields = (!empty($fields) ? json_encode($fields) : null);
        }
        if($format == "query"){
            $this->fields = (!empty($fields) ? http_build_query($fields) : null);
        }
    }

    /**
     * @param string $endPoint
     * @param string $method
     * @param string|null $apiUrl
     */
    protected function request(string $endPoint, string $method, string $apiUrl = null):void {
        $this->endPoint = $endPoint;
        $this->method = $method;
        $this->dispatch($apiUrl);
    }

    /**
     * @return mixed
     */
    public function response() {
        return $this->response;
    }

    /**
     * @param string|null $apiUrl
     */
    private function dispatch(?string $apiUrl):void {
        $apiUrl = ($apiUrl??$this->apiUrl);
        $curl = curl_init("{$apiUrl}/{$this->endPoint}");
        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_POSTFIELDS => $this->fields,
            CURLOPT_HTTPHEADER => ($this->headers),
            CURLOPT_SSL_VERIFYPEER => $this->sslVerifypeer,
            CURLINFO_HEADER_OUT => true
        ]);
        $this->response = json_decode(curl_exec($curl));
        curl_close($curl);
    }

}
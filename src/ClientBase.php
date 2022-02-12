<?php

use \GuzzleHttp\Psr7\Utils;

namespace AZabironin\Xlsxtojson;

abstract class ClientBase
{
    public $client;
    private $settings;
    

    public function __construct()
    {
        $this->settings = new XlsxtojsonSettings();

        $headers = [
            "Content-Type" => "application/json",
            "Accept" => "application/json",
            "Authorization" => "Token ".$this->settings->API_KEY,
        ];

        $this->client = new \GuzzleHttp\Client([
            "base_uri" => "https://xlsxtojson.com/api/account/",
            "headers" => $headers,
            "timeout" => $this->settings->TIMEOUT_SEC == "false" ? false : $this->settings->TIMEOUT_SEC,
            "verify" =>  $this->settings->CACERT_PEM == "false" ? false : $this->settings->CACERT_PEM,
        ]);
    }

    protected function get($url, $query = [])
    {
        $response = $this->client->get($url, ["query" => $query]);
        return json_decode($response->getBody(), true);
    }

    protected function post($url, $data)
    {
        $response = $this->client->post($url, [
            "json" => $data
        ]);
        return json_decode($response->getBody(), true);
    }
}

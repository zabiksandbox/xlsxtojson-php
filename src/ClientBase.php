<?php

use \GuzzleHttp\Psr7\Utils;

namespace AZabironin\Xlsxtojson;

abstract class ClientBase
{
    public $client;
    public $mclient;
    private $token;

    public function __construct($baseUrl, $token)
    {
        $this->token = $token;

        $headers = [
            "Content-Type" => "application/json",
            "Accept" => "application/json",
            "Authorization" => "Token ".$token,
        ];

        $this->client = new \GuzzleHttp\Client([
            "base_uri" => $baseUrl,
            "headers" => $headers,
            "timeout" => Settings::TIMEOUT_SEC,
            "verify" =>  Settings::CACERT_PEM,
        ]);

        $this->mclient = new \GuzzleHttp\Client([
            "base_uri" => $baseUrl,
            "timeout" => Settings::TIMEOUT_SEC,
            "verify" =>  Settings::CACERT_PEM,
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

    protected function multipart($url, $filepath, $options)
    {


        if (file_exists($filepath)) {
            $multipart = [
                'headers' => [
                    "Content-Type" => "multipart/form-data",
                    "Accept" => "application/json",
                    "Authorization" => "Token ".$this->token,
                ],
                'multipart' => [
                    [
                        'name'      => 'file',
                        'filename'  => basename($filepath),
                        'contents'  => \GuzzleHttp\Psr7\Utils::tryFopen($filepath, 'r')
                    ]
                ],
            ];
            if (Settings::CACERT_KEY) {
                $multipart['cert'] = [Settings::CACERT_KEY, Settings::CACERT_KEY_PASSPHRASE];
            }
            foreach($options as $key => $value) {
                $multipart['multipart'][] = [
                    'name' => $key,
                    'contents' => $value,
                ];    
            }
            $response = $this->mclient->request('POST', $url, $multipart);
            return json_decode($response->getBody(), true);
        } else {
            return [
                'success' => false,
                'data' => "File not found (".$filepath.")",
            ];
        }
    }
}

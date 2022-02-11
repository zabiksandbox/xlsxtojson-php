<?php

namespace AZabironin\Xlsxtojson;

class Xlsxtojson extends ClientBase
{
    const BASE_URL = "https://api.xlsxtojson.com/";

    public function __construct($token)
    {
        parent::__construct(self::BASE_URL, $token);
    }

    public function parse($filepath, $options)
    {
        $url = "";
        $response = $this->multipart($url, $filepath, $options);
        return $response;
    }
}

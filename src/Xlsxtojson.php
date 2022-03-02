<?php

namespace AZabironin\Xlsxtojson;

class Xlsxtojson extends ApiBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function parse($filepath, $options)
    {
        $url = "";
        $response = $this->multipart($url, $filepath, $options);
        return $response;
    }
}

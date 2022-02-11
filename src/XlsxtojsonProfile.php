<?php

namespace AZabironin\Xlsxtojson;

class XlsxtojsonProfile extends ClientBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLimit()
    {
        $url = "limit";
        $response = $this->get($url);
        return $response;
    }
}

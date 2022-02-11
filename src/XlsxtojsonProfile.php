<?php

namespace Zabiksandbox\Xlsxtojson;

use DateTime;

class XlsxtojsonProfile extends ClientBase
{
    const BASE_URL = "https://xlsxtojson.com/api/account/";

    public function __construct($token)
    {
        parent::__construct(self::BASE_URL, $token);
    }

    public function getLimit()
    {
        $url = "limit";
        $response = $this->get($url);
        return $response["balance"];
    }
}

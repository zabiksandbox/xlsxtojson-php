<?php

namespace AZabironin\Xlsxtojson;

class XlsxtojsonClient
{

    public function __construct($token)
    {
        $dotenv = new Symfony\Component\Dotenv\Dotenv();
        $dotenv->load(__DIR__.'/.env', __DIR__.'/.env.dev');
        Settings::TIMEOUT_SEC = getenv('XLSXTOJSON_TIMEOUT_SEC') ?? getenv('XLSXTOJSON_TIMEOUT_SEC');
        Settings::CACERT_PEM = getenv('XLSXTOJSON_CACERT_PEM') ?? getenv('XLSXTOJSON_CACERT_PEM');
        Settings::CACERT_KEY = getenv('XLSXTOJSON_CACERT_KEY') ?? getenv('XLSXTOJSON_CACERT_KEY');
        Settings::CACERT_KEY_PASSPHRASE = getenv('XLSXTOJSON_CACERT_KEY_PASSPHRASE') ?? getenv('XLSXTOJSON_CACERT_KEY_PASSPHRASE');
        Settings::APIKEY = getenv('XLSXTOJSON_APIKEY') ?? getenv('XLSXTOJSON_APIKEY');

        $this->XlsxtoJson   = new XlsxtoJson($token);
        //$this->JsontoXlsx   = new JsontoXlsx($token);
        $this->profile      = new XlsxtojsonProfile($token);
    }

    public function getLimit()
    {
        return $this->profile->getLimit();
    }

    public function parseXlsx($filepath, $options = [])
    {
        return $this->XlsxtoJson->parse($filepath, $options);
    }
}

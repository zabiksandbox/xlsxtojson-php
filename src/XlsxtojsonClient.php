<?php

namespace AZabironin\Xlsxtojson;

class XlsxtojsonClient
{

    public function __construct()
    {
        
        $this->XlsxtoJson   = new XlsxtoJson();
        //$this->JsontoXlsx   = new JsontoXlsx($token);
        $this->profile      = new XlsxtojsonProfile();
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

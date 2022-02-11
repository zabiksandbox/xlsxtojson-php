<?php

require '../vendor/autoload.php';

$Xlsxtojson = new \AZabironin\Xlsxtojson\XlsxtojsonClient();
$limits = $Xlsxtojson->getLimit();

print print_r($a,1);

$xlsxArray = $Xlsxtojson->parseXlsx('D:\Расхождения в резервах МП.xlsx');
print print_r($a,1);
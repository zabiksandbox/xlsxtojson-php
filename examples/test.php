<?php

require './vendor/autoload.php';

$Xlsxtojson = new \AZabironin\Xlsxtojson\XlsxtojsonClient();
$limits = $Xlsxtojson->getLimit();
print print_r($limits,1);

$xlsxArray = $Xlsxtojson->parseXlsx('path_to_file.xlsx');
print print_r($xlsxArray,1);
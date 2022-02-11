<?php

namespace AZabironin\Xlsxtojson;

class XlsxtojsonSettings
{
	public $TIMEOUT_SEC;
	public $CACERT_PEM;
	public $CACERT_KEY;
	public $CACERT_KEY_PASSPHRASE;
	public $API_KEY;

	public function __construct(){
		$dotenv = new \Symfony\Component\Dotenv\Dotenv();

		if (!file_exists(__DIR__.'/../../../../.env')) {$fh = fopen(__DIR__.'/../../../../.env', 'w') or die("Can't create .env file");}
		if (!file_exists(__DIR__.'/../../../../.env')) {$fh = fopen(__DIR__.'/../../../../.env.dev', 'w') or die("Can't create env.dev file");}

        $dotenv->load(__DIR__.'/../../../../.env', __DIR__.'/../../../../.env');

        $this->TIMEOUT_SEC 				= isset($_ENV['XLSXTOJSON_TIMEOUT_SEC']) ? $_ENV['XLSXTOJSON_TIMEOUT_SEC'] : 30;
	    $this->CACERT_PEM 				= isset($_ENV['XLSXTOJSON_CACERT_PEM']) ? $_ENV['XLSXTOJSON_CACERT_PEM'] : false;
	    $this->CACERT_KEY 				= isset($_ENV['XLSXTOJSON_CACERT_KEY']) ? $_ENV['XLSXTOJSON_CACERT_KEY'] : false;
	    $this->CACERT_KEY_PASSPHRASE 	= isset($_ENV['XLSXTOJSON_CACERT_KEY_PASSPHRASE']) ? $_ENV['XLSXTOJSON_CACERT_KEY_PASSPHRASE'] : '';
	    $this->API_KEY 					= isset($_ENV['XLSXTOJSON_APIKEY']) ? $_ENV['XLSXTOJSON_APIKEY'] : '';
        
        
	}
    
}

<?php

namespace AZabironin\Xlsxtojson;
use ComposerScriptEvent;

class Installer
{
    public static function postPackageInstall(\Composer\Script\Event $event) {
        $installedPackage = $event->getComposer()->getPackage();

        $rootDir = $event->getComposer()->getConfig()->get('vendor-dir').'/../';
        print $rootDir.PHP_EOL;
        if (!file_exists($rootDir.'.env')) {

            $cfg = "XLSXTOJSON_APIKEY=\"\"".PHP_EOL.
            "XLSXTOJSON_TIMEOUT_SEC=30".PHP_EOL.
            "XLSXTOJSON_CACERT_PEM=false".PHP_EOL.
            "XLSXTOJSON_CACERT_KEY=false".PHP_EOL.
            "XLSXTOJSON_CACERT_KEY_PASSPHRASE=\"\"".PHP_EOL;
            
            $cfgFile = fopen($rootDir.'.env', "w+");
            fwrite($cfgFile, $cfg);
            fclose($cfgFile);
            
            if (!file_exists($rootDir.'.env.dev')) {
                $cfgFile = fopen($rootDir.'.env.dev', "w+");
                fwrite($cfgFile, "");
                fclose($cfgFile);    
            }           
        }

    }
}
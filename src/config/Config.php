<?php
namespace MyApp\config;

use MyApp\Core\DotEnv;

class Config{
    public static function load(){
        (new DotEnv(__DIR__ . '../../.env'))->load();
        
        define('BASEURL', getenv('BASE_URL'));
    }
}





// $file = "../src/config/config.properties";
// if(!file_exists($file)){
//     echo "Config file not found!";
//     exit();
// }

// Parameter true membuat array menjadi multidimensi berdasarkan section
// $properties = parse_ini_file($file, true);


// define('DB_HOST', $properties['database']['db_host']);
// define('DB_USER', $properties['database']['db_user']);
// define('DB_PASS', $properties['database']['db_pass']);
// define('DB_NAME', $properties['database']['db_name']);
// define('DB_PORT', $properties['database']['db_port']);
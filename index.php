<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
         $url = "https://";
    else
         $url = "http://";

    $url.= $_SERVER['HTTP_HOST'];
    $url.= $_SERVER['REQUEST_URI'];

    $url_components = parse_url($url);
    if (isset($url_components['path']) && $url_components['path'] != DIRECTORY_SEPARATOR) {
        $path = __DIR__.'/pages'.$url_components['path'].'.php';
        if (file_exists($path)) {
            require_once $path;
        } else {
            require_once __DIR__.'/pages/404.php';
        }
        exit();
    }

    require_once __DIR__.'/pages/sign-in.php';
    exit();



/*require_once 'vendor/autoload.php';
$hello = new \framework\DB\DataBase();
echo $hello->message;*/
?>
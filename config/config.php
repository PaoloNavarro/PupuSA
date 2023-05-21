<?php
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') {
    // Estás en localhost
    define("DEFAULT_URL" , "Home/Index");
    define("DEFAULT_CONTROLLER" , "Home");
    define("DEFAULT_ACTION" , "Index");
    define("VIEW_LAYOUT_PATH" , "views/layout/");
    define("DEFAULT_TITLE" , "Mejor comer...");
    define("PUBLIC_PATH" , "public/");
    define('APP', dirname(dirname(__FILE__)));
    define('URL', 'http://localhost/pupuSA/');
    define('dbname',"pupusa");
    define('user',"root");
    define('host',"localhost");
    define('past',"");

} else {
    //estoy en mi servidor
    define("DEFAULT_URL" , "Home/Index");
    define("DEFAULT_CONTROLLER" , "Home");
    define("DEFAULT_ACTION" , "Index");
    define("VIEW_LAYOUT_PATH" , "views/layout/");
    define("DEFAULT_TITLE" , "Mejor comer...");
    define("PUBLIC_PATH" , "public/");

        // Reemplaza la siguiente línea
        // define('APP', dirname(dirname(_FILE_)));

        // Con esta otra línea, que define la ruta absoluta al directorio raíz del sitio web
    define('APP', $_SERVER['DOCUMENT_ROOT']);

        // Y utiliza la URL de tu sitio web en lugar de 'http://localhost/pupuSA/'
    define('URL', 'https://pupusa-restaurant.000webhostapp.com/');
    
    //varibale db
    define('dbname',"id20259048_pupusa");
    define('user',"id20259048_root");
    define('host',"localhost");
    define('past',"^MDyhgkqXpE6v0vv");
}


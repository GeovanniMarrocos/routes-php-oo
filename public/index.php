<?php 
require('../vendor/autoload.php');
require('../routes/routes.php');

try{

    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $request = $_SERVER["REQUEST_METHOD"];
    dump($request);

    if(!isset($router[$request]))
    {
        throw new Exception("A rota não existe");
    }

    if(!array_key_exists($uri, $router[$request]))
    {
        throw new Exception("A rota não existe");
    }

    $router[$request][$uri];

} catch (Exception $e){
    $e->getMessage();
}
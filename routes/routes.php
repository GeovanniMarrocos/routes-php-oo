<?php 
use Exception;

function load(string $controller, string $action)
{
   
   try{

    $controllerNamespace = "app\\controllers\\{$controller}";
    
    if(!class_exists($controllerNamespace))
    {
        throw new Exception("O controller {$controller} não existe"."\n");
    }

    $controllerInstance = new $controllerNamespace();

    if(method_exists($controllerInstance, $action))
    {
        throw new Exception("O método {$action} não existe no controller {$controller}"."\n");
    }

    $controllerInstance->action();

}catch(Exception $e){
    echo $e->getMessage();
}

}

$routes = [

    "GET" => [
        "/" => load("HomeController", "index"),
        "/contact" => load("ContactController", "index"),
    ],

    "POST" =>[
       "/contact" => load("ContactController", "store"),
    ], 
];





?>
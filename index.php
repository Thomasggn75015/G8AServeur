<?php

require 'vendor/autoload.php';
require 'app/database/config.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'MVC_G8A/app/Views' . DIRECTORY_SEPARATOR);

$router = new App\Router\Router($_GET['url']);

//Lignes d'exemples :
$router->get('/', "Post#homepage");
//On passe :slug et :id en paramètres, on appelle le contrôleur Post et sa méthode show, séparateur #
$router->get('/posts/:slug-:id', "Post#show")->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

try{
    $router->run(); 
} catch(NotFoundException $e){
    return $e->error404();
}
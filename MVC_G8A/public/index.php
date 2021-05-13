<?php

require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

//Lignes d'exemples :
$router->get('/', function(){ echo 'Homepage'; });
//On passe :slug et :id en paramètres, on appelle le contrôleur Post et sa méthode show, séparateur #
$router->get('/posts/:slug-:id', "Post#show")->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

try{
    $router->run(); 
} catch(NotFoundException $e){
    return $e->error404();
}
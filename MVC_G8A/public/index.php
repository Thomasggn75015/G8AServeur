<?php

require 'vendor/autoload.php';

//define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);

$router = new App\Router\Router($_GET['url']);

//Lignes d'exemples :
$router->get('/posts', function(){ echo 'Homepage'; });
//On passe :slug et :id en paramètres, on appelle le contrôleur Post et sa méthode show, séparateur #
$router->get('/posts/:slug-:id', "Post#show")->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

//$router->get('/', 'Post#coucou');
try{
    $router->run(); 
} catch(NotFoundException $e){
    return $e->error404();
}
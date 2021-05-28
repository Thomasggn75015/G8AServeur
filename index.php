<?php

require 'vendor/autoload.php';
require 'app/database/config.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'G8AServeur/app/Views' . DIRECTORY_SEPARATOR);

$router = new App\Router\Router($_GET['url']);

//Redirection depuis l'accueil
$router->get('/', 'Main#accueil');
$router->get('/cgu', 'Main#cgu');
$router->get('/enregistrement', 'Main#enregistrement');


//On passe :slug et :id en paramètres, on appelle le contrôleur Post et sa méthode show, séparateur #
$router->get('/posts/:slug-:id', "Post#show")->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

try{
    $router->run(); 
} catch(NotFoundException $e){
    return $e->error404();
}

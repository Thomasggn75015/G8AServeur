<?php

require 'vendor/autoload.php';
require 'app/database/config.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'G8AServeur/app/Views' . DIRECTORY_SEPARATOR);

$router = new App\Router\Router($_GET['url']);
//Redirection depuis l'accueil
$router->get('/', 'Main#accueil');
$router->get('/cgu', 'Main#cgu');


$router->get('/profil', 'Search#profil');
$router->post('/profil', 'Search#profilPost');
$router->post('/profil/modifProfil', 'Search#validerModifProfil');

$router->get('/connexion', 'User#connect');

$router->get('/enregistrement', 'User#enregistrement');
$router->post('/enregistrement', 'User#verif');

$router->get('/mail', 'Mail#contact');
$router->post('/mail', 'Mail#verif');

$router->post('/resultats_graphiques', 'Resultat#affichage_sportif');
$router->post('/resultats_graphiques', 'Resultat#resultats');

//On passe :slug et :id en paramètres, on appelle le contrôleur Post et sa méthode show, séparateur #
$router->get('/posts/:slug-:id', "Post#show")->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

try{
    $router->run();
} catch(NotFoundException $e){
    return $e->error404();
}

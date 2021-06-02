<?php

require 'vendor/autoload.php';
require 'app/database/config.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'G8AServeur/app/Views' . DIRECTORY_SEPARATOR);

$router = new App\Router\Router($_GET['url']);
//Page d'accueil
$router->get('/', 'Main#accueil');

//Page d'enregistrement
$router->get('/enregistrement', 'User#enregistrement');
$router->post('/enregistrement', 'User#verif');

//Page de connexion
$router->get('/connexion', 'Connexion#connect');
$router->post('/connexion', 'Connexion#verifConnect');

//Page de profil
$router->get('/profil', 'Search#profil');
$router->post('/profil', 'Search#profilPost');
$router->post('/profil/modif', 'Search#validerModifProfil');
$router->post('/deleteUser', 'Search#deleteUser');
$router->post('/modifyUser', 'Search#modifyUser');
$router->post('/addUser', 'Search#addUser');

//Page de données
$router->get('/data_user', 'Resultat#affichage_sportif');

//page de mention légales
$router->get('/mention', 'Main#mention');

//Page de CGU
$router->get('/cgu', 'Main#cgu');

//Page de FAQ
$router->get('/faq', 'Main#faq');

//Page d'envoi de mail
$router->get('/mail', 'Mail#contact');
$router->post('/mail', 'Mail#verif');

//Destruction de la session actuelle
$router->get('/destroy', 'Search#destroySession');

try{
    $router->run();
} catch(NotFoundException $e){
    return $e->error404();
}

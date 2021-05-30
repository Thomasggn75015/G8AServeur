<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Database\DBConnection;

/**
 * Cette classe est abstraite car elle ne sera jamais instanciée directement
 */
abstract class Controller{
    
    //Variable permettant de faire de l'injection de dépendance dans tous les controllers
    protected $db;

    public function __construct(DBConnection $db){

        if(session_status() === PHP_SESSION_NONE){
            session_start(); //La session qui permet de faire des connexions
        }
        $this->db = $db;
    }

    /**
     * Permet de rendre la vue en lui passant des paramètres s'il y en a.
     * Utilisation d'un système de buffering pour envoyer le contenu dans la vue.
     */
    protected function view(string $path, array $params = null){
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'template.php';
    }

    protected function getDB(){
        return $this->db;
    }

    public function setCurrentSession($id_user, $id_role){
        $_SESSION['user_id']   = $id_user;
        $_SESSION['user_role'] = $id_role;
    }

    public function isLoggedIn(){
        return isset($_SESSION['user_id'])? true : header('Location: /login');
    }

    /**
     * Fonction permettant de vérifier si l'utilisateur connecté est un admin
     * Permet de protéger des fonctions qui ne peuvent être exécutées que par un admin
     */
    protected function isAdmin(){
        if(isset($_SESSION['user_id'])){
            if($user->id_role == "admin"){
                return true;
            }
            else{
                return false;
            }
        }
    }

    protected function isNotSportsman(){
        if(isset($_SESSION['user_id'])){
            if($user->id_role == "admin" || $user->id_role == "coach" ){
                return true;
            }
            else{ 
                return false; 
            }
        }
    }

    public function destroySession(){
        session_destroy();
        setcookie("athl_user_id", "", time()-3600);
        setcookie("athl_user_mode", "", time()-3600);
        return header('Location: /');
    }

}
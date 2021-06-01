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

    public function setCurrentSession($user_id, $user_pseudo, $user_role, $user_mail){
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_pseudo'] = $user_pseudo;
        $_SESSION['user_role'] = $user_role;
        $_SESSION['user_mail'] = $user_mail;

        setcookie('user_id', $user_id, time() + 365*24*3600, null, null, false, true);
        setcookie('user_pseudo', $user_pseudo, time() + 365*24*3600, null, null, false, true);
        setcookie('user_role', $user_role, time() + 365*24*3600, null, null, false, true);
        setcookie('user_mail', $user_mail, time() + 365*24*3600, null, null, false, true);
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
            if($_SESSION["user_role"] == "admin"){
                return true;
            }
            else{
                return false;
            }
        }
    }

    protected function isNotSportsman(){
        if(isset($_SESSION['user_id'])){
            if($_SESSION["user_role"]== "admin" || $_SESSION["user_role"] == "coach" ){
                return true;
            }
            else{ 
                return false; 
            }
        }
    }

    public function destroySession(){
        session_destroy();
        setcookie("user_id", "", time()-3600);
        setcookie("user_pseudo","", time()-3600);
        setcookie("user_role", "", time()-3600);
        setcookie("user_mail", "", time()-3600);
        return header('Location: /');
    }

}
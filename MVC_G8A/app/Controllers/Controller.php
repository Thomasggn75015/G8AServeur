<?php

namespace App\Controllers;

/**
 * Cette classe est abstraite car elle ne sera jamais instancié directement
 */
abstract class  Controller{
    
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
        require VIEWS . 'layout.php';
    }

    protected function getDB(){
        return $this->db;
    }

    public function setCurrentSession($id_user, $id_role){
        $_SESSION['athl_user_id']   = $id_user;
        $_SESSION['athl_user_role'] = $id_role;
    }

    public function isLoggedIn(){
        return isset($_SESSION['athl_user_id'])? true : header('Location: /login');
    }

    /**
     * Fonction permettant de vérifier si l'utilisateur connecté est un admin
     * Permet de protéger des fonctions qui ne peuvent être exécuter que par un admin
     */
    protected function isAdmin(){
        if(isset($_SESSION['athl_user_id'])){
            $user = (new User($this->getDB()))->findById($_SESSION['athl_user_id']);
            if($user->id_role === "1"){
                return true;
            }
        }
        $this->destroySession();
    }

    protected function isNotAthlete(){
        if(isset($_SESSION['athl_user_id'])){
            $user = (new User($this->getDB()))->findById($_SESSION['athl_user_id']);
            if($user->id_role === "1" || $user->id_role == "2" ){
                return true;
            }
        }
        $this->destroySession();
    }

    public function destroySession(){
        session_destroy();
        setcookie("athl_user_id", "", time()-3600);
        setcookie("athl_user_mode", "", time()-3600);
        return header('Location: /');
    }

}
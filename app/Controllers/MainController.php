<?php

namespace App\Controllers;

class MainController extends Controller{

    public function accueil(){
        return $this->view('main.homepage');
    }

    public function enregistrement(){
        return $this->view('main.enregistrement');
    }

    public function profil(){
        return $this->view('main.profil');
    }
    public function cgu(){
        return $this->view('main.cgu');
    }

}
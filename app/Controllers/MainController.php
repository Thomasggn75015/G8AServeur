<?php

namespace App\Controllers;

class MainController extends Controller{

    public function accueil(){
        return $this->view('main.homepage');
    }

    public function enregistrement(){
        return $this->view('main.enregistrement');
    }

    public function cgu(){
        return $this->view('main.cgu');
    }

    public function mention(){
        return $this->view('main.mention');
    }

    public function faq(){
        return $this->view('main.faq');
    }

}
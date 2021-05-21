<?php

namespace App\Controllers;

class PostController extends Controller{
    
    public function show($slug, $id){
        echo "Je suis l'article " . $id . " Je suis en page" . $_GET['page'];
    }

    public function homepage(){
        return $this->view('main.homepage');
    }
}
<?php

namespace App\Controllers;

class PostController{
    public function show($slug, $id){
        echo "Je suis l'article " . $id . " Je suis en page" . $_GET['page'];
    }
}
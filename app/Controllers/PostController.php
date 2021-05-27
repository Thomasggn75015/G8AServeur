<?php

namespace App\Controllers;

class PostController extends Controller{ //Ceci est un exemple de contrôleur acceptant des paramètres dans sa fonction
                                         //la ligne correspondante à l'url d'appel de ce contrôleur est présente dans le fichier index
    
    public function show($slug, $id){
        echo "Je suis l'article " . $id . " Je suis en page" . $_GET['page'];
    }
}
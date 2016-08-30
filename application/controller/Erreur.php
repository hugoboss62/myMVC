<?php

class Erreur
{
    public function index(){
        header("HTTP/1.0 404 Not Found");
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/footer.php';
    }
}

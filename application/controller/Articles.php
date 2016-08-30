<?php

class Administration
{
    public function __construct()
    {
    }

    /*public function index()
    {
        require APP . 'view/_templates/admin/header.php';
        require APP . 'view/administration/index.php';
        require APP . 'view/_templates/admin/footer.php';
    }*/

    public function nouveau()
    {
        if(empty($user = CurrentUser::$user)){
            header('location: ' . URL . 'log/in/');
            exit;
        }



        require APP . 'view/_templates/header.php';
        require APP . 'view/articles/nouveau.php';
        require APP . 'view/_templates/footer.php';
    }

}

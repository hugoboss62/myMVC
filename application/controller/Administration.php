<?php

class Administration
{
    public function __construct()
    {
        if(empty(CurrentUser::$user) || !CurrentUser::$user->isAdmin()){
            header('location: ' . URL . 'log/in/');
            exit;
        }
    }

    public function index()
    {
        require APP . 'view/_templates/admin/header.php';
        require APP . 'view/administration/index.php';
        require APP . 'view/_templates/admin/footer.php';
    }

}

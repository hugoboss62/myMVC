<?php

class CurrentUser
{
    static $user=null;

    public function __construct(){
        CurrentUser::$user = isset($_SESSION['id']) ? UsersManager::getById($_SESSION['id']) : null;
    }
}
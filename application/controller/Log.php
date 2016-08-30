<?php

class Log

{

    function in()
    {
        if(!empty(CurrentUser::$user))
            Url::redir('/');

        if(isset($_POST['email']) && isset($_POST['password'])){
            $user = UsersManager::getByEmail($_POST['email']);
            if(!empty($user) && $user->testPassword($_POST['password'])){
                $_SESSION['id'] = $user->getId();
                new Alert('success', "check-square", "Vous êtes maintenant connecté !");
                Url::redir('/');
            }else
                new Alert('warning', "exclamation-triangle", "L'utilisateur ou le mot de passe ne correspond pas");
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/log/in.php';
        require APP . 'view/_templates/footer.php';
    }

    public function out()
    {
        new Alert('success', "check-square", "Vous êtes maintenant déconnecté !");
        unset($_SESSION['id']);
        header('location: ' . URL . 'log/in/');
    }
}

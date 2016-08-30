<?php

class Utilisateur
{
    public function index($id=null)
    {
        $user = CurrentUser::$user;

        if($id==null){
            if(empty($user)){
                new Alert('warning', 'exclamation-triangle', 'Il faut être connecté pour accéder pour accéder à ce lien');
                Url::redir('/erreur/');
            }else
                Url::redir('/utilisateur/' . $user->getId() . '/');
        }

        $ownProfil = !empty($user) && $user->getId() == $id;

        $profilUser = $ownProfil ? $user : UsersManager::getById($id);

        require APP . 'view/_templates/header.php';
        require APP . 'view/utilisateur/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function modifier(){
        if(empty($user = CurrentUser::$user)) {
            new Alert('warning', 'exclamation-triangle', 'Il faut être connecté pour modifier son profil');
            Url::redir('/erreur/');
        }
    }
}

<?php

class Inscription

{
    private function testPost(array $keys){
        foreach($keys as $key)
            if(!isset($_POST[$key]) || empty($_POST[$key]))
                return $key;

        return true;
    }

    public function index(){
        if(!empty(CurrentUser::$user))
            Url::redir('/');

        if(!empty($_POST))
            if(($key = $this->testPost(array('lastname','firstname','email','password'))) === true){

                if($_POST['password'] == $_POST['password_verif']) {
                    $user = new User();
                    $user->setFromForms();
                    if($user->save()){
                        new Alert('success', "check-square", "Votre inscription s'est déroulée avec succés !");
                        $_SESSION['id'] = $user->getId();
                        Url::redir('/');
                    }else
                        new Alert('warning', "exclamation-triangle", "L'inscription a échoué...");
                }else
                    new Alert('warning', "exclamation-triangle", "Les deux mots de passe ne sont pas identiques.");

            }else
                new Alert('warning', "exclamation-triangle", "Le champ " . $key . " n'est pas complété...");

        require APP . 'view/_templates/header.php';
        require APP . 'view/inscription/index.php';
        require APP . 'view/_templates/footer.php';
    }
}

<?php

class UsersManager extends ModelManager {
    // Nom de la table en base
    public static $table = 'users';
    // Nom de la classe enfant
    public static $class = 'User';

    public static function getByEmail($email){

        $sql = "SELECT * FROM " . self::$table . " WHERE email=?";
        $query=DB::getInstance()->prepare($sql);
        $query->execute(array($email));
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, UsersManager::$class);

        return $query->fetch();

    }
}
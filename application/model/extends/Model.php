<?php

abstract class Model
{
    private $pdo, $table, $tableColumns, $pictureFormats;
    
    protected function __construct($table, $tableColumn, $pictureFormats=null)
    {
        // Assignation de l'instance unique de PDO
        $this->pdo = DB::getInstance();
        // Assignation du nom de la table grâce à la classe appelante
        $this->table = $table;
        // Recensement de l'ensemble des colonnes de la table avec les valeurs associées par référence
        $this->tableColumns = $tableColumn;
        foreach(array_keys($this->tableColumns) as $key)
            $this->tableColumns[$key] = &$this->$key;

        // Si la table comporte l'upload de photo
        $this->pictureFormats = $pictureFormats;
    }

    public function setFromForms()
    {
        foreach($_POST as $key => $val){
            $setter = 'set' . ucfirst($key);
            if(method_exists($this, $setter))
                $this->$setter(empty($val) ? $this->$key : Functions::secure($val));
        }
        foreach($_FILES as $key => $val)
            $this->$key = (Functions::upload($key, ROOT . 'public/img/' . $this->table . '/' . $this->getNextId() . '/', 'picture', $this->pictureFormats) OR $this->$key);
    }

    /////////////////////////
    ///// Fonctions sql /////
    /////////////////////////

    protected function getNextId()
    {
        $req = $this->pdo->query("SHOW TABLE STATUS FROM " . DB_NAME . " LIKE '" . $this->table . "' ");
        return $req->fetch()['Auto_increment'];
    }

    public function save() 
    {
        if(empty($this->id))
            return $this->insert();
        return $this->update();
    }

    public function delete()
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = ?";
        $query = $this->pdo->prepare($sql);

        return $query->execute(array($this->id));
    }

    protected function insert()
    {
        $sql = "INSERT INTO " . $this->table . " VALUES(";

        foreach($this->tableColumns as $key => &$val)
            $sql .= ":$key,";

        $sql = substr($sql,0,-1) . ')';
        $query = $this->pdo->prepare($sql);

        $success = @$query->execute($this->tableColumns);

        if($success)
            $this->id = $this->pdo->lastInsertId();

        return $success;
    }
        
    protected function update() 
    {
        $sql = "UPDATE " . $this->table . " SET";

        foreach($this->tableColumns as $key => &$val)
            $sql .= " $key = :$key,";

        $sql = substr($sql,0,-1);
        $sql .= " WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        
        return $query->execute($this->tableColumns);
    }

}

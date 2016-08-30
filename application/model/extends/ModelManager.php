<?php

abstract class ModelManager{
	private static function getTable(){
		$class = get_called_class();
		return $class::$table;
	}

	private static function getClass(){
		$class = get_called_class();
		return $class::$class;
	}

	public static function getAll(array $options = array()){

		$sql = "SELECT * FROM " . self::getTable();
		$sql .= isset($options['order']) ? " ORDER BY " . $options['order'] : "";
		$query=DB::getInstance()->prepare($sql);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, self::getClass());
		
		return $query->fetchAll();
		
	}

	public static function getById($id){

		$sql = "SELECT * FROM " . self::getTable() . " WHERE id=?";
		$query=DB::getInstance()->prepare($sql);
		$query->execute(array($id));
		$query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, self::getClass());
		return $query->fetch();
		
	}

	public static function count(){

		$sql = "SELECT count(*) as count FROM " . self::getTable();
		$query=DB::getInstance()->prepare($sql);
		$query->execute();
		
		return $query->fetch()['count'];
		
	}

}
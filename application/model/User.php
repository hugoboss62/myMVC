<?php

class User extends Model
{
	public $id, $lastname, $firstname, $email, $password, $picture, $role;
	
	public function __construct() 
	{
		// On renseigne au constructeur parent le nom de la table et ses colonnes
		$table = 'users';
		$tableColumns = get_object_vars($this);
		$pictureFormats = array(
			array('suffix' => 'large', 'width' => '725', 'height' => '', 'quality' => 100, 'watermark' => '', 'verifSize' => true),
			array('suffix' => 'logo', 'width' => '150', 'height' => '150', 'quality' => 100, 'watermark' => '', 'verifSize' => true),
		    array('suffix' => 'medium', 'width' => '360', 'height' => '', 'quality' => 100, 'watermark' => '', 'verifSize' => true)
		);
		parent::__construct($table, $tableColumns, $pictureFormats);
	}

	// GETTERS qui utilisent les attributs d'instance

	public function getPermalink(){
		return 'utilisateur/' . $this->id . '/';
	}

	public function getPicture($size){
		$size = isset($size) ? "_$size" : "";
		return empty($this->picture) ? null : URL . 'img/users/' . $this->id . '/picture' . $size . '.jpg';
	}

	public function getName(){
		return $this->firstname . ' ' . $this->lastname;
	}

	public function testPassword($pass_uncrypted){
		return password_verify($pass_uncrypted, $this->getPassword());
	}

	public function isAdmin(){
		return $this->role == "admin";
	}



	// GETTERS & SETTERS des attributs d'instance

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getLastname()
	{
		return $this->lastname;
	}

	/**
	 * @param mixed $lastname
	 */
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}

	/**
	 * @return mixed
	 */
	public function getFirstname()
	{
		return $this->firstname;
	}

	/**
	 * @param mixed $firstname
	 */
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password)
	{
		$this->password = password_hash($password, PASSWORD_BCRYPT);
	}

	/**
	 * @param mixed $picture
	 */
	public function setPicture($picture)
	{
		$this->picture = $picture;
	}

	/**
	 * @return mixed
	 */
	public function getRole()
	{
		return $this->role;
	}

	/**
	 * @param mixed $role
	 */
	public function setRole($role)
	{
		$this->role = $role;
	}



	


}
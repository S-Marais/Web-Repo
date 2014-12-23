<?php

class User extends DbObject
{
	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $key_hash;
	public $id_profile;
	public $active;

	protected $_table_name = 'user';
	public $_definition = array(
		'firstname' => array(self::_TYPE_STRING_, 2, 32),
		'lastname' => array(self::_TYPE_STRING_, 2, 32),
		'email' => array(self::_TYPE_EMAIL_, 3, 255),
		'password' => array(self::_TYPE_PASSWORD_, 6, 64),
		'key_hash' => array(self::_TYPE_STRING_, 0, 32),
		'active' => array(self::_TYPE_BOOLEAN_),
		'id_profile' => array(self::_TYPE_INT_, 1),
	);

	static public function loadByEmail($email)
	{
		$query = new DbQuery();
		$query->select('id_user');
		$query->from('user', 'u');
		$query->where('u.email = "'.Tools::sqlEscape($email).'"');
		return new User(Db::getInstance()->getValue($query));
	}

	public function checkPassword($password)
	{
		return $this->password == MD5(_SECURE_KEY_.$password.$this->key_hash);
	}

	public function isLoggedIn()
	{
	}
}

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

	static public function checkPassword($password, $id_user)
	{
		$query = new DbQuery();
		$query->select('id_user');
		$query->from('user', 'u');
		$query->where('u.id_user == '.(int)$id_user);
		$query->where('u.password == "'.$password.'"');
		return !!Db::getInstance()->getRow();
	}

	public function isLoggedIn()
	{
	}
}

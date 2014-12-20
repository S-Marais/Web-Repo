<?php

class User extends DbObject
{
	public $firstname;
	public $lastname;
	public $password;
	public $id_profile;

	protected $_table_name = 'user';
	protected $_definition = array(
		'firstname' => self::_TYPE_STRING_,
		'lastname' => self::_TYPE_STRING_,
		'password' => self::_TYPE_STRING_,
		'id_profile' => self::_TYPE_INT_,
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

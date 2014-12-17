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
}

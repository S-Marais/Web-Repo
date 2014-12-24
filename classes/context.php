<?php

class Context
{
	/* singleton */
	private static $instance;

	public $cookie;
	public $user;
	public $received_token;
	public $old_token;
	public $new_token;
	public $id_lang;

	public static function getContext()
	{
		if (!isset(self::$instance)) {
			self::$instance = new Context();
		}
		return self::$instance;
	}

	public function initContext()
	{
		$this->cookie = new Cookie('cee');
		$this->user = new User((int)$this->cookie->__get('id_user'));
		$password = $this->cookie->__get('password');
		if ($this->user->checkPassword($password, true)) {
			$this->user->logged = true;
		}
		$this->received_token = Tools::getValue('token');
		$this->old_token = Session::get('token');
		$this->new_token = Token::generate($this->user);
		$this->id_lang = (int)$this->cookie->__get('id_lang');
	}

	public function cloneContext()
	{
		return clone($this);
	}
}

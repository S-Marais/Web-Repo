<?php

class Context
{
	/* singleton */
	private static $instance;

	public $cookie;
	public $user;
	public $token;
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
		$this->cookie = new Cookie('context');
		$this->user = new User((int)$this->cookie->__get('id_user'));
		$this->token = Tools::getValue('token');
		$this->id_lang = (int)$this->cookie->__get('id_lang');
	}

	public function cloneContext()
	{
		return clone($this);
	}
}

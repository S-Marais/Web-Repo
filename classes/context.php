<?php

class Context
{
	/* singleton */
	private static $instance;

	public $cookie;
	public $user;
	public $token;
	public $id_lang;

	public function initContext()
	{
	}

	public static function getContext()
	{
		if (!isset(self::$instance)) {
			self::$instance = new Context();
		}
		return self::$instance;
	}

	public function cloneContext()
	{
		return clone($this);
	}
}

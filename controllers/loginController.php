<?php

class LoginController extends Controller
{
	public function __construct()
	{
		echo 'This is the login page<br />';
		$this->_other();
	}

	protected function _other()
	{
		echo 'This is the other function, lolz.';
	}
}

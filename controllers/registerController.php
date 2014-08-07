<?php

class RegisterController
{
	public function __construct()
	{
		echo 'This is the register page<br />';
		$this->_other();
	}

	protected function _other()
	{
		echo 'This is the other function, lolz.';
	}
}
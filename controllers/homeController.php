<?php

class HomeController
{
	public function __construct()
	{
		echo 'This is the home page<br />';
		$this->_content();
	}

	protected function _content()
	{
		echo 'This is the home content, lolz.';
	}
}
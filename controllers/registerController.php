<?php

class RegisterController extends Controller
{
	public function __construct()
	{
		$this->_other();
	}

	protected function _other()
	{
		$this->templateName = 'views/layout.html';
		$this->renderView();
	}
}

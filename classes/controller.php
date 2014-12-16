<?php

class Controller
{
	public $token;
	public $tpl;
	public $template_name = false;

	public function __construct()
	{
		$this->token = Tools::getValue('token');
		$this->template_name = _TEMPLATE_DIR_.'/'.strtolower(preg_replace('/Controller$/', '', get_class($this))).'/view.tpl.html';
		$this->tpl = new tpl();
	}

	protected function render()
	{
		$this->tpl->display($this->template_name);
	}
}

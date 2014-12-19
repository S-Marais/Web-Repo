<?php

class tpl extends Smarty
{
	public $auto_literal = false;


	public function __construct()
	{
		$this->error_reporting = E_ALL & ~E_NOTICE;
		parent::__construct();
		$this->setTemplateDir(_TEMPLATE_DIR_)
		->setCompileDir(_ROOT_DIR_.'cache/Smarty/compiled')
		->setCacheDir(_ROOT_DIR_.'cache/Smarty/cache')
		->setConfigDir(_ROOT_DIR_.'config/SmartyConfig');
	}
}

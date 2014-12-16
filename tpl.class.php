<?php

class tpl extends Smarty
{
	public $auto_literal = false;


	public function __construct()
	{
		$this->error_reporting = E_ALL & ~E_NOTICE;
		parent::__construct();
		$this->setTemplateDir(dirname(__FILE__)._TEMPLATE_DIR_)
		->setCompileDir(dirname(__FILE__).'/templates/compiled')
		->setCacheDir(dirname(__FILE__).'/templates/cache')
		->setConfigDir(dirname(__FILE__).'/config/smarty_config');
	}
}

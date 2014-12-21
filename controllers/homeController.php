<?php

class HomeController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->tpl->assign('current_user', Context::getContext()->user);
		$method = "process".$this->action;
		$this->addJsVars(array('method' => $method));
		if (method_exists($this, $method)) {
			$this->$method();
		} else {
			$this->render();
		}
	}

	public function setMedia()
	{
		$this->addJQuery();
		$this->addJS('js/log.js');
		$this->addJsVars(array('token' => $this->context->new_token));
		$this->addCSS('css/home.css');
		parent::setMedia();
	}

	public function processRegisterUser()
	{
		if (Token::isValid($this->context)) {
			die (json_encode(array(
				"result" => true,
				"msg" => "Its something!",
			)));
		}
		die (json_encode(array(
			"result" => false,
			"error" => 'Nope!',
		)));
	}
}

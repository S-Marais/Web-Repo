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
			$email = Tools::getValue('email');
			$profile = Tools::getValue('profile');
			$firstname = Tools::getValue('firstname');
			$lastname = Tools::getValue('lastname');
			$password = Tools::getValue('password');

			$user = new User();
			$user->email = $email;
			$user->profile = $profile;
			$user->firstname = $firstname;
			$user->lastname = $lastname;
			$user->password = MD5(_SECURE_KEY_.$password);
			$user->save();
			die (json_encode(array(
				"result" => true,
				"msg" => "Wellcome ".$user->firstname,
			)));
		}
		die (json_encode(array(
			"result" => false,
			"error" => 'Nope!',
		)));
	}

	public function processLoginUser()
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

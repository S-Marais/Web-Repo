<?php

class HomeController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->tpl->assign('current_user', $this->context->user);
	}

	public function setMedia()
	{
		$this->addJQuery();
		$this->addJS('js/tools.js');
		$this->addJS('js/log.js');
		$this->addJsVars(array('token' => $this->context->new_token));
		$this->addCSS('css/home.css');
		parent::setMedia();
	}

	public function processRegisterUser()
	{
		$email = Tools::getValue('email');
		$id_profile = Tools::getValue('id_profile');
		$firstname = Tools::getValue('firstname');
		$lastname = Tools::getValue('lastname');
		$password = Tools::getValue('password');

		$user = new User();
		$user->firstname = $firstname;
		$user->lastname = $lastname;
		$user->email = $email;
		$user->id_profile = $id_profile;
		$user->password = $password;
		$invalid_rows = Validate::isInvalidObject($user);

		if (!$invalid_rows) {
			$user->key_hash = MD5(uniqid());
			$user->password = MD5(_SECURE_KEY_.$password.$user->key_hash);
			$user->save();
			die (json_encode(array(
				"result" => true,
				"msg" => "Wellcome ".$user->firstname,
			)));
		}
		die (json_encode(array(
			"result" => false,
			"error" => 'Invalid values submited.',
			"invalid_inputs" => $invalid_rows,
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

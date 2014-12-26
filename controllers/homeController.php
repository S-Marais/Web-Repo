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
		parent::setMedia();
		$this->addJS('js/tools.js');
		$this->addJS('js/log.js');
		$this->addJsVars(array('token' => $this->context->new_token));
		$this->addCSS('css/home.css');
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
		if (User::loadByEmail($email)->isLoadedObject()) {
			$invalid_rows[] = 'user_exists';
		}

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
			"invalid_inputs" => $invalid_rows,
		)));
	}

	public function processLoginUser()
	{
		$email = Tools::getValue('email');
		$password = Tools::getValue('password');
		$user = User::loadByEmail($email);
		if ($user->checkPassword($password)) {
			$cookie = new Cookie('cee');
			$cookie->__set('id_user', $user->id);
			$cookie->__set('password', $user->password);
			$cookie->write();
			die (json_encode(array(
				"result" => true,
				"msg" => "Wellcome back!",
			)));
		}
		die (json_encode(array(
			"result" => false,
			"error" => 'Nope!',
		)));
	}

	public function processLogoutUser()
	{
		$this->context->cookie->delete();
		die (json_encode(array(
			"result" => true,
		)));
	}
}

<?php

class ProfileController extends Controller
{
	public $profile_user;

	public function __construct()
	{
		parent::__construct();
		
		$this->getLinks();
		$this->tpl->assign('current_user', $this->context->user);
		$this->tpl->assign('members', User::loadMembers());

		$this->profile_user = new User((int)Tools::getValue('id'));
		$this->tpl->assign('avatar_path', $this->profile_user->getProfileImagePath());
		if (Tools::isSubmit('edit')
			&& $this->context->user->logged
			&& ($this->context->user->id == $this->profile_user->id || $this->context->user->id_profile == 1)) {
			$this->template_name = _TEMPLATE_DIR_.'/'
				.strtolower(preg_replace('/Controller$/', '', get_class($this)))
				.'/edit.html';
		} else if (Tools::isSubmit('edit') || !$this->profile_user->isLoadedObject()) {
			Tools::redirect('home');
		}
	}

	public function getLinks()
	{
		$this->tpl->assign('home_link', _DOMAIN_.'/home');
		$this->tpl->assign('my_profile_link', _DOMAIN_.'/profile&edit&id='.$this->context->user->id);
		$this->tpl->assign('my_profile_link', _DOMAIN_.'/profile&edit&id='.$this->context->user->id);
		$this->addJsVars(array('id_user' => $this->context->user->id));
	}

	public function setMedia()
	{
		parent::setMedia();
		$this->addCSS('css/profile.css');
		$this->addJS('js/tools.js');
		$this->addJS('js/log.js');
		$this->addJS('js/home_menu.js');
		$this->addJS('js/profile.js');
		$this->addJsVars(array('token' => $this->context->new_token));
	}

	public function processUploadProfileImage()
	{
		$accepted_img_type = array(
			"image/png" => '.png',
			"image/gif" => '.gif',
			"image/jpeg" => '.jpeg',
		);
		$user = new User((int)Tools::getValue('id'));
		if (!array_key_exists($_SERVER['CONTENT_TYPE'], $accepted_img_type))
			die ("Error file must be a jpeg, png, gif image.");
		if ((int)$_SERVER['CONTENT_LENGTH'] != 0 && (int)$_SERVER['CONTENT_LENGTH'] < 300000) {
			foreach ($accepted_img_type as $ending_type) {
				if (file_exists('img/uploads/'.$user->firstname.'-'.$user->lastname.'-'.$user->id.$ending_type))
					unlink('img/uploads/'.$user->firstname.'-'.$user->lastname.'-'.$user->id.$ending_type);
			}
			file_put_contents(
				'img/uploads/'.$user->firstname.'-'.$user->lastname.'-'.$user->id.$accepted_img_type[$_SERVER['CONTENT_TYPE']],
				file_get_contents('php://input')
			);
			die("success");
		} else {
			die ("Error file size is too big.");
		}
	}
}

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
		if (Tools::isSubmit('edit')
			&& $this->context->user->logged
			&& ($this->context->user->id == $this->profile_user->id || $this->context->user->id_profile == 1)) {
			$this->template_name = _TEMPLATE_DIR_.'/'
				.strtolower(preg_replace('/Controller$/', '', get_class($this)))
				.'/edit.html';
		} else if (!Tools::isSubmit('edit')
			&& $this->profile_user->isLoadedObject()
			&& ($this->context->user->id == $this->profile_user->id || $this->context->user->id_profile == 1)) {
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
}

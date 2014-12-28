<?php

class ProfileController extends Controller
{
	public $profile_user;

	public function __construct()
	{
		parent::__construct();
		$this->profile_user = new User((int)Tools::getValue('id'));
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
}

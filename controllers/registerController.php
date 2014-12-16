<?php

class RegisterController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->_render_view();
	}

	protected function _render_view()
	{
		$this->tpl->assign('title', 'Register:');
		$this->render();
	}
}

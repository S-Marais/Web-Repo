<?php

class LoginController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->template_name = _TEMPLATE_DIR_.'/login/view.tpl.html';
		$this->_render_view();
	}

	protected function _render_view()
	{
		$this->tpl->assign('title', 'Please login:');
		$this->render();
	}
}

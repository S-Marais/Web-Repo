<?php

class HomeController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->template_name = _TEMPLATE_DIR_.'/home/view.tpl.html';
		if (!$this->token) {
			header('Location: /login');
		}
		$this->_render_view();
	}

	protected function _render_view()
	{
		$this->render();
	}
}

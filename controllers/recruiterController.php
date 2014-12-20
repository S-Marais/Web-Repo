<?php

class RecruiterController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->token) {
			header('Location: /home');
		}
		$this->_render_view();
	}

	protected function _render_view()
	{
		$this->tpl->assign('title', 'Recruiter:');
		$this->render();
	}
}

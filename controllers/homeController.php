<?php

class HomeController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->_render_view();
	}

	public function setMedia()
	{
		$this->addCSS('css/home.css');
		parent::setMedia();
	}

	protected function _render_view()
	{
		$this->render();
	}
}

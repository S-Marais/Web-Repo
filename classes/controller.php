<?php

class Controller
{
	public $templateName;

	protected function renderView()
	{
		$view = file_get_contents("$this->templateName");
		echo $view;
	}	
}

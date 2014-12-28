<?php

class Route
{
	private $_uri_method;

	public function __construct()
	{
		$this->_uri_method = array(
			_ROOT_DIR_.'home'		=> 'HomeController',
			_ROOT_DIR_.'profile'	=> 'ProfileController',
			_ROOT_DIR_.'association'=> 'AssociationController',
		);
	}

	/**
	 *	Build a collection of internal URL's to look for
	 *	@param type $uri
	 */
	public function add($uri, $method = null)
	{
		if ($method != null)
		{
			$this->_uri_method[_ROOT_DIR_.trim($uri, '/')] = $method;
		}
	}

	/**
	 *	Makes the thing run!
	 */
	public function submit()
	{
		$uri_get_param = isset($_GET['uri']) ? _ROOT_DIR_.$_GET['uri'] : _ROOT_DIR_;
		foreach ($this->_uri_method as $key => $controller) {
			if (preg_match("#^$key$#", $uri_get_param)) {
				return (new $controller())->run();
			}
		}
		header('Location: /'._ROOT_DIR_.'home');
	}
}

<?php

class Route
{
	private $_uri_method;

	public function __construct()
	{
		$this->_uri_method = array(
			_ROOT_DIR_.'home'		=> 'HomeController',
			_ROOT_DIR_.'register'	=> 'RegisterController',
			_ROOT_DIR_.'login'		=> 'LoginController',
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
		if (preg_match("#^"._ROOT_DIR_."$#", $uri_get_param)) {
			header(_ROOT_DIR_.'home');
		} else {
			foreach ($this->_uri_method as $key => $value) {
				if (preg_match("#^$key$#", $uri_get_param)) {
					new $value();
				}
			}
		}
	}
}

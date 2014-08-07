<?php

class Route
{
	private $_uri = array();
	private $_method = array();

	/**
	 *	Build a collection of internal URL's to look for
	 *	@param type $uri
	 */
	public function add($uri, $method = null)
	{
		if ($method != null)
		{
			$this->_uri[] = '/'.trim($uri, '/');
			$this->_method[] = $method;
		}
	}

	/**
	 *	Makes the thing run!
	 */
	public function submit()
	{
		$uriGetParam = isset($_GET['uri']) ? '/'.$_GET['uri'] : '/';
		foreach ($this->_uri as $Key => $Value)
		{
			if (preg_match("#^$Value$#", $uriGetParam))
			{
				$useMethod = $this->_method[$Key];
				new $useMethod();
			}
		}
	}
}

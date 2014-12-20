<?php

Class Cookie
{
	protected $_content;
	protected $_name;
	protected $_expire;
	protected $_domain;
	/* enable cookie on all the domain for now */
	protected $_path = '/';
	/* Will be used for encrypting cookies */
	protected $_cipherTool;
	protected $_key;
	protected $_iv;
	protected $_modified = false;

	public function __construct($name, $path = '', $expire = null)
	{
		$this->_content = array();
		$this->_expire = isset($expire) ? (int)($expire) : (time() + 1728000);
		$this->_name = md5(_SECURE_KEY_.$name);
		$this->_path = ($path ? $path : $this->_path);
		$this->_key = _COOKIE_KEY_;
		$this->_iv = _COOKIE_IV_;
		$this->_cipherTool = new Blowfish($this->_key, $this->_iv);
		$this->update();
	}

	/* Read $_COOKIE */
	public function update()
	{
		if ($this->exists())
		{
			/* Decrypt cookie content */
			$content = $this->_cipherTool->decrypt($_COOKIE[$this->_name]);
			$checksum = crc32($this->_iv.substr($content, 0, strrpos($content, '¤') + 2));
			$tmpTab = explode('¤', $content);
			foreach ($tmpTab as $keyAndValue)
			{
				$tmpTab2 = explode('|', $keyAndValue);
				if (count($tmpTab2) == 2)
					$this->_content[$tmpTab2[0]] = $tmpTab2[1];
			}
			if (isset($this->_content['checksum'])) {
				$this->_content['checksum'] = (int)($this->_content['checksum']);
			}

			/* Check if cookie has not been modified */
			if (!isset($this->_content['checksum']) || $this->_content['checksum'] != $checksum) {
				$this->logout();
			}

			if (!isset($this->_content['date_add'])) {
				$this->_content['date_add'] = date('Y-m-d H:i:s');
			}
		} else {
			$this->_content['date_add'] = date('Y-m-d H:i:s');
		}
	}

	public function setExpire($expire)
	{
		$this->_expire = (int)($expire);
	}

	public function __get($key)
	{
		return isset($this->_content[$key]) ? $this->_content[$key] : false;
	}

	public function __isset($key)
	{
		return isset($this->_content[$key]);
	}

	public function __set($key, $value)
	{
		if (is_array($value) || preg_match('/¤|\|/', $key.$value))
			die('Error in Cookie class invalid parameter $value in __set()\n');
		if (!$this->_modified && (!isset($this->_content[$key]) || (isset($this->_content[$key]) && $this->_content[$key] != $value)))
			$this->_modified = true;
		$this->_content[$key] = $value;
	}

	public function __unset($key)
	{
		if (isset($this->_content[$key]))
			$this->_modified = true;
		unset($this->_content[$key]);
	}

	public function getName()
	{
		return $this->_name;
	}

	public function exists()
	{
		return isset($_COOKIE[$this->_name]);
	}

	protected function getDomain($shared_urls = null)
	{
		$r = '!(?:(\w+)://)?(?:(\w+)\:(\w+)@)?([^/:]+)?(?:\:(\d*))?([^#?]+)?(?:\?([^#]+))?(?:#(.+$))?!i';
		if (!preg_match ($r, Tools::getHttpHost(false, false), $out) || !isset($out[4])) {
			return false;
		}
		if (preg_match('/^(((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]{1}[0-9]|[1-9]).)'.
			'{1}((25[0-5]|2[0-4][0-9]|[1]{1}[0-9]{2}|[1-9]{1}[0-9]|[0-9]).)'.
			'{2}((25[0-5]|2[0-4][0-9]|[1]{1}[0-9]{2}|[1-9]{1}[0-9]|[0-9]){1}))$/', $out[4])) {
			return false;
		}
		if (!strstr(Tools::getHttpHost(false, false), '.')) {
			return false;
		}
		$domain = false;
		if ($shared_urls !== null)
		{
			foreach ($shared_urls as $shared_url)
			{
				if ($shared_url != $out[4]) {
					continue;
				}
				if (preg_match('/^(?:.*\.)?([^.]*(?:.{2,3})?\..{2,3})$/Ui', $shared_url, $res))
				{
					$domain = '.'.$res[1];
					break;
				}
			}
		}
		if (!$domain)
			$domain = $out[4];
		return $domain;
	}

	protected function _setcookie($cookie = null)
	{
		if ($cookie)
		{
			$content = $this->_cipherTool->encrypt($cookie);
			$time = $this->_expire;
		}
		else
		{
			$content = 0;
			$time = 1;
		}
		if (PHP_VERSION_ID <= 50200) /* PHP version > 5.2.0 */
			return setcookie($this->_name, $content, $time, $this->_path, $this->_domain, 0);
		else
			return setcookie($this->_name, $content, $time, $this->_path, $this->_domain, 0, true);
	}

	public function __destruct()
	{
		$this->write();
	}

	public function write()
	{
		if (!$this->_modified || headers_sent())
			return;
		$cookie = '';
		/* Serialize cookie content */
		if (isset($this->_content['checksum'])) unset($this->_content['checksum']);
		foreach ($this->_content as $key => $value)
			$cookie .= $key.'|'.$value.'¤';
		$cookie .= 'checksum|'.crc32($this->_iv.$cookie);
		$this->_modified = false;
		return $this->_setcookie($cookie);
	}

	public function getFamily($origin)
	{
		$result = array();
		if (count($this->_content) == 0)
			return $result;
		foreach ($this->_content as $key => $value)
			if (strncmp($key, $origin, strlen($origin)) == 0)
				$result[$key] = $value;
		return $result;
	}

	public function unsetFamily($origin)
	{
		$family = $this->getFamily($origin);
		foreach (array_keys($family) as $member)
			unset($this->$member);
	}
}

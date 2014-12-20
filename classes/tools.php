<?php

class Tools
{
	static public function getValue($label)
	{
		if (!empty($_POST[$label])) {
			return $_POST[$label];
		} else if (!empty($_GET[$label])) {
			return $_GET[$label];
		}
		return false;
	}

	static public function protectQuotes($string, $double = false)
	{
		if ($double)
			return preg_replace('"', '\"', $string);
		return preg_replace("/'/", "\'", $string);
	}

	static public function decrypt_blowfish($data, $key){
		$iv=pack("H*" , substr($data,0,16));
		$x =pack("H*" , substr($data,16)); 
		$res = mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $x , MCRYPT_MODE_CBC, $iv);
		return $res;
	}

	static public function encrypt_blowfish($data, $key){
		$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_CBC);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$crypttext = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $data, MCRYPT_MODE_CBC, $iv);
		return bin2hex($iv . $crypttext);
	}
}

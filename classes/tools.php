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
}

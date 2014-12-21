<?php

class Token
{
	static public function generate($user)
	{
		Session::delete('token');
		if ($user->isLoadedObject()) {
			return Session::put('token', MD5($user->id_profile._COOKIE_KEY_.$user->id));
		} else {
			return '';
		}
	}

	static public function isValid($context)
	{
		return $context->old_token == $context->received_token;
	}
}

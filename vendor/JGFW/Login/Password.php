<?php 

namespace JGFW\Login;

class Password
{
	public static function hash($password)
	{
		return password_hash($password,PASSWORD_BCRYPT);
	}

	public function verificarPassword($password,$hash)
	{
		if(password_verify($password,$hash))
		{
			return true;
		}
		return false;
	}
}
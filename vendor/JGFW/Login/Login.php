<?php 

namespace JGFW\Login;

use JGFW\Login\Password;
use JGFW\Session\Session;

class Login
{
	private $password;

	public function __construct()
	{
		$this->password = new Password();
	}


	public function verificarPass($password,$hash)
	{
		return $this->password->verificarPassword($password,$hash);
	}

	public function verificarEmail($email,$emailbd)
	{
		if($email == $emailbd)
		{
			return true;
		}
		return false;
	}

	public function verificarLogin($email,$pass,$emailbd,$hash)
	{
		if($this->verificarPass($pass,$hash) && $this->verificarEmail($email,$emailbd))
		{
			return true;
		}
		return false;
	}

	public function logout()
	{
		if(Session::get('user'))
		{
			Session::free('user');
			Session::destroy();

			return true;
		}
		return false;
	}
}
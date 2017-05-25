<?php 

namespace JGFW\Session;

class Session
{
	public function __construc()
	{
		if(!session_id())
		{
			session_start();
		}
	}

	public static function set(string $name,$value)
	{
		$_SESSION[$name] = $value;
	}

	public static function get(string $name)
	{
		if(isset($_SESSION[$name]))
		{
			return $_SESSION[$name];
		}

		return false;
	}

	public static function free(string $name)
	{
		unset($_SESSION[$name]);
	}

	public static function destroy()
	{
		$_SESSION = array();
		session_destroy();
	}


}
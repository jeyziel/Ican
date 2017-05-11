<?php 

namespace JGFW\Routes;

class Uri
{
	public static function uri():String
	{
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}

	public static function method():String
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
}
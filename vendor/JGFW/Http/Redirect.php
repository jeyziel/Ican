<?php 

namespace JGFW\Http;

class Redirect
{

	public static function to($target)
    {
        return header("location:{$target}");
    }

}
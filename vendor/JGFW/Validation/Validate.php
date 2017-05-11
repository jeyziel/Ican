<?php 

namespace JGFW\Validation;

use JGFW\Validation\SanitazeAndValidate;


class Validate
{
	public function sanitaze(\Closure $closure)
	{
		$sanitaze = new SanitazeAndValidate();
		$returnValidate = null;
		
		foreach($closure() as $key => $value)
		{
			$returnValidate = $sanitaze->SanitazeAndValidate($key,$value);
		}

		return $returnValidate;

	}
}
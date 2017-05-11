<?php 

namespace JGFW\Validation;

trait TraitSanitaze
{

	public function string($key)
	{
		$string = filter_input(INPUT_POST,$key,FILTER_SANITIZE_STRING);

		$this->input->$key = $string;
	}

	public function int($key)
	{
		$int = filter_input(INPUT_POST,$key,FILTER_SANITIZE_STRING);

		$this->input->$key = $int;
	}

}
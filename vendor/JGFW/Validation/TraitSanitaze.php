<?php 

namespace JGFW\Validation;

trait TraitSanitaze
{

	private function string($key)
	{
		$string = filter_input(INPUT_POST,$key,FILTER_SANITIZE_STRING);

		$this->input->$key = $string;
	}

	public function checkbox($key)
	{
		$checkbox = $_POST[$key]; //mudar pra filter_input
		$this->input->$key = $checkbox;
		
	}

	private function int($key)
	{
		$int = filter_input(INPUT_POST,$key,FILTER_SANITIZE_NUMBER_INT);

		$this->input->$key = $int;
	}

}
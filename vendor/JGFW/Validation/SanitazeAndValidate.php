<?php 

namespace JGFW\Validation;

use JGFW\Validation\Input;
use JGFW\Validation\PersistInput;
use JGFW\Validation\TraitSanitaze;
use JGFW\Validation\TraitValidate;

class SanitazeAndValidate
{
	private $input;
	private $message;

	use TraitValidate,TraitSanitaze;

	public function __construct()
	{
		$this->input = new Input();
		$this->message = new Message();
	}

	public function SanitazeAndValidate($key,$value)
	{
		if(substr_count($value,'|') <= 0)
		{
			throw new \Exception("Você precisa passar mais de uma validação {$key}");
		}

		$explode = explode('|',$value);

		if(!in_array('required',$explode))
		{
			throw new \Exception("Você precisa passar o required");
		}

		foreach($explode as $validation)
		{
			$this->$validation($key);
		}

		
		if($this->message->hasErrors())
		{
			(new PersistInput())->set($this->input->get());
			return [];
		}	

		return $this->input->get();


	}
}

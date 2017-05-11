<?php 

namespace JGFW\Validation;

trait TraitValidate
{
	public function required($key)
	{
		if(empty($_POST[$key]))
		{
			$this->message->set($key,"Esse campo é obrigatório");
		}
	}

	private function email($key)
    {
        $email = filter_input(INPUT_POST,$key,FILTER_VALIDATE_EMAIL);

        if(!$email)
        {
            $this->message->set($key,"Esse email precisa ser válido");
        }
        
        $this->input->$key = $email;
        
    }
}
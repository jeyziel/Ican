<?php 

namespace JGFW\Validation;

trait TraitValidate
{
	private function required($key)
	{
		if(empty($_POST[$key]))
		{
			$this->message->set($key,"Esse campo é obrigatório");
		}
	}

	private function email($key)
    {
        $email = filter_input(INPUT_POST,$key,FILTER_VALIDATE_EMAIL);

        if($email)
        { 
        	$this->input->$key = $email;
        }
        else
        {
        	 $this->input->$key = $_POST[$key];
        	 $this->message->set($key,"Esse email precisa ser válido");
        }
        
        
        
    }
}
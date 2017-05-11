<?php 

namespace JGFW\Template;

use JGFW\Validation\Message;
use JGFW\Validation\PersistInput;

class Template
{
	private $fileTemplate;

	private $template;

	private $data = [];

	//metodo magico chamando o body no template master
	public function __call($key,$folder)
	{
		if(!isset($this->data['view']))
		{
			throw new \Exception("Você necessita informar a view");
		}

		$this->template = "./../App/Views/{$folder[0]}/{$this->data['view']}.template.php";

		if(!file_exists($this->template))
		{
			throw new \Exception("File {$folder[0]} not found");
		}

		foreach($this->data as $key => $value)
		{
			$$key = $value;
		}


		require "{$this->template}";


	}

	public function load($file)
	{
		$this->fileTemplate = "./../App/Views/{$file}.template.php";

		if(!file_exists($this->fileTemplate))
		{
			throw new \Exception("arquivo {$file} não encontrado");	
		}

		return $this;
	}

	public function data($data)
	{
		if(!is_array($data))
		{
			throw new \Exception("Você precisa passar um array");
		}

		$this->data = $data;

		return $this;
	}

	//colocar esses método em outro lugar depois..talves uma classe helper slá

	public function error($key)
	{
		return (new Message())->display($key);
	}

	public function getInput($value)
	{
		return (new PersistInput())->getInput($value);
	}


	//fim

	public function render()
	{
		ob_start();

		require "{$this->fileTemplate}";

		(new Section())->sectionVariables($this->data);
	}


}
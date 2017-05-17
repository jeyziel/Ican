<?php 

namespace JGFW\Validation;

trait TraitModelValidate
{
	public function unique($key,$model)
	{
		$model = new $model;


		if($model::where($key,$_POST[$key])->first())
		{
			$this->message->set($key,"esse campo ja está cadastrado ");
		}

	}
}
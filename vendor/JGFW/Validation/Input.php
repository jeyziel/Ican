<?php 

namespace JGFW\Validation;

class Input
{
	private $data = [];

	public function __set($key,$value)
	{
		$this->data[$key] = $value;
	}

	public function get()
	{
		return (object) $this->data;
	}
}
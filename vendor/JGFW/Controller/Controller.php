<?php 

namespace JGFW\Controller;

use JGFW\Template\Template;

class Controller
{

	protected $template;

	public function __construct()
	{
		$this->template = new Template;	
	}

	/**
	*@param array $data
	*@param string $data
	**/
	public function view($data,$master)
	{
		$this->template->data($data)->load($master)->render();
	}
}
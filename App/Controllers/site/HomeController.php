<?php 

namespace App\Controllers\site;

use JGFW\Controller\Controller;
use JGFW\Session\Session;

class HomeController extends Controller
{
	public function index()
	{
		$master = "site/layout";

		

    	$data = [
    		'nome' => 'jeyziel',
    		'view' => 'index',
    		'nome' => Session::get('user')['nome'] ?? ''
    	];

    	$this->view($data,$master);
	}

	
}
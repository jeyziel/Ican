<?php 

namespace App\Controllers\site;

use JGFW\Controller\Controller;

class HomeController extends Controller
{
	public function index()
	{
		$master = "site/layout";

    	$data = [
    		'nome' => 'jeyziel',
    		'view' => 'index'
    	];

    	$this->view($data,$master);
	}

	
}
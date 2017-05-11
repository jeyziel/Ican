<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 19/04/17
 * Time: 19:54
 */

namespace App\Controllers\site;


use App\Model\User;
use JGFW\Controller\Controller;
use JGFW\Http\Redirect;
use JGFW\Template\Template;
use JGFW\Validation\Validate;

class UserController extends Controller
{
    private $user;

  

    public function index()
    {
    	$master = "site/layout";

    	$data = [
    		'nome' => 'jeyziel',
    		'view' => 'Home'
    	];

    	$this->view($data,$master);

    }

    public function store()
    {
        $data = (new Validate())->sanitaze(function(){
           return [
                'nome' =>'required|string',
                'senha' => 'required|string',
                'email' => 'required|email|unique:' . User::class;
           ];
        });

        if(empty($data))
        {
           Redirect::to('/user');
        }

        $user = new User;
        $user->create((array) $data);
    }

    public function show()
    {
        echo 'estou no método show';
    }

    // public function __construct()
    // {
    //     $this->user = new User;
    // }

    // public function get()
    // {
    //     return $this->user->all();
    // }

}
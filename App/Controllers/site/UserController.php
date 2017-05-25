<?php

namespace App\Controllers\site;

use App\Model\User;
use JGFW\Controller\Controller;
use JGFW\Http\Redirect;
use JGFW\Login\Login;
use JGFW\Login\Password;
use JGFW\Session\Session;
use JGFW\Validation\Validate;

class UserController extends Controller
{
    private $user;
    private $password;
    private $login;

    public function __construct()
    {
        parent::__construct();
        $this->password = new Password();
        $this->login = new Login();
        $this->user = new User();
    }

    public function create()
    {
        $master = "site/layout";

        $data = [
            'nome' => 'jeyziel',
            'view' => 'user_create',
        ];

        $this->view($data,$master);
    }

    public function store()
    {
        $data = (new Validate())->sanitaze(function(){
            return [
                'nome' => 'required|string',
                'email' => 'required|email|unique:' . User::class,
                'senha' => 'required|string',
            ];
        });

        if(empty($data))
        {
            return Redirect::to('/user/create');
        }

        $data->senha = Password::hash($data->senha);
        $data->role = 1;

        try {
            $user = $this->user->create((array)$data);
            if($user->id)
            {
                return Redirect::to('/');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function loginCreate()
    {
       $master = "site/layout";

        $data = [
            'nome' => 'jeyziel',
            'view' => 'user_login',
        ];

        $this->view($data,$master);
    }

    public function login()
    {
        $data = (new Validate())->sanitaze(function(){
            return [
                'email' => 'required|email',
                'senha' => 'required|string'
            ];      
        });

        if(empty($data))
        {
            return Redirect::to('/login');
        }

        $user = $this->user->where('email',$data->email)->first();

        if($user->email)
        {
            if($this->login->verificarLogin($data->email,$data->senha,$user->email,$user->senha))
            {
                $dados = [
                    'nome' => $user->nome,
                    'role' => $user->role
                ];
                Session::set('user',$dados);

                return Redirect::to('/');
            }
            else
            {
                return Redirect::to('/');
            }
        }
    }

    public function logout()
    {
       if($this->login->logout())
       {
            return Redirect::to('/');
       }
    }
}
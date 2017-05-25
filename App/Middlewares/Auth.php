<?php 

namespace App\Middlewares;

use JGFW\Http\Redirect;
use JGFW\Session\Session;

/**
*classe responsavel por verificar se o usuario está logado
*/


class Auth
{
	public function boot()
    {
        if(!Session::get('user'))
        {
            return Redirect::to('/');
        }
    }
}
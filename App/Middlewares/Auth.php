<?php 

namespace App\Middlewares;

use JGFW\Http\Redirect;

/**
*classe responsavel por verificar se o usuario está logado
*/


class Auth
{
	public function boot()
    {
        if(!$_SESSION['logado'] || empty($_SESSION['logado']))
        {
            return Redirect::to('/');
        }
    }
}
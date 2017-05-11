<?php 

namespace JGFW\Routes;

use JGFW\Routes\Uri;
use JGFW\Routes\Middlewares;

class Routes
{
	use ReplaceSegmentsUri,Middlewares;
	private $get = [];
	private $post = [];
	private $middlewares = [];

	public function get($uri,$controller,$middlewares = null)
	{
		$this->get[$uri] = $controller;
		if(!is_null($middlewares))
		{
			$this->middlewares[$uri] = $middlewares;
		}
	}

	public function post($uri,$controller,$middlewares = null)
	{
		$this->post[$uri] = $controller;

		if(!is_null($middlewares))
		{
			$this->middlewares[$uri] = $middlewares;
		}
	}

	public function run()
	{
		$http = Uri::method();

		if(!array_key_exists(Uri::uri(), $this->$http))
		{
			$this->replaceUriSegmentsAndGetArguments($http);
		}
		$this->callControllerAndMethod($http);

	}

	public function callControllerAndMethod($http)
	{
		$uri = Uri::uri(); //uri que vem do site

		if(in_array($uri,array_keys($this->$http)))
		{
			$this->applyMiddlewareinRoutes($this->middlewares);

			$controller = strtok($this->$http[$uri], "@");
			$method = substr($this->$http[$uri], strpos($this->$http[$uri],"@")+1);
			
			$class = "App\\Controllers\\{$controller}";
			if(!class_exists($class))
			{
				throw new \Exception("Classe nao existe");
			}

			$controller = new $class;
			$controller->$method();
			
		}
		else
		{
			throw new \Exception("Rota nao encontrada");
			
		}


	}





}
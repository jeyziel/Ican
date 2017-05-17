<?php 

namespace App\Controllers\site;

use App\Model\Category;
use App\Model\Post;
use JGFW\Controller\Controller;
use JGFW\Http\Redirect;
use JGFW\Validation\Message;
use JGFW\Validation\Validate;

class PostsController extends Controller
{
	private $post;
	private $category;
	private $msg;

	public function __construct()
	{
		parent::__construct();
		$this->post = new Post;
		$this->category = new Category;
		$this->msg = new Message();
	}
	public function index()
	{
		$master = "site/layout";

		$postsEncontrados = $this->post->all();
		$categories = $this->category->all();

    	$data = [
    		'title' => 'lista de posts',
    		'view' => 'posts',
    		'posts' => $postsEncontrados,
    		'categories' => $categories
    	];

    	$this->view($data,$master);
	}

	public function create()
	{
		$master = "site/layout";
		$categories = (new Category())->all();

    	$data = [
    		'nome' => 'jeyziel',
    		'view' => 'post_create',
    		'categories' => $categories
    	];


    	$this->view($data,$master);

	}

	public function store()
	{
		$data = (new Validate())->sanitaze(function(){
			return [
		    	'title' => 'required|string',
		    	'content' => 'required|string',
		    	'category_id' => 'required|checkbox'    
			];
		});

		if(empty($data))
        {
           return Redirect::to('/post/create');
        }

        try
        {	
        	$post = $this->post->create((array)$data);
        	if(isset($data->category_id))
        	{
        		$post->category()->attach($data->category_id);
        	}

        	 return Redirect::to('/posts');
        }catch(\Exception $e)
        {
        	echo $e->getMessage();
        }
	}

	public function edit($request)
	{
		$master = "site/layout";
		$postsEncontrados = $this->post->find($request->post);
		$categories = (new Category())->all();

		$data = [
			'title' => 'editar posts',
			'post' => $postsEncontrados,
			'view' => 'post_edit',
			'categories' => $categories
		];

		$this->view($data,$master);
	}

	public function update($request)
	{
		$data = (new Validate())->sanitaze(function(){
			return [
		    	'title' => 'required|string',
		    	'content' => 'required|string',
		    	'category_id' => 'required|checkbox'    
			];
		});

		try
		{
			if(empty($data))
			{	
				return Redirect::to('/post/edit/' . $request->post);
			}

			$post = $this->post->find($request->post);
			$post->update((array)$data);

			if(isset($data->category_id))
			{
				$post->category()->sync($data->category_id);
			}
			// else
			// {
   //              $post->category()->detach();
   //          }

            return Redirect::to('/posts');
		}
		catch(\Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function delete($request)
	{
		try
		{
			$post = $this->post->find($request->post);

			if($post)
			{
				$post->category()->detach();
				$post->delete();
				$this->msg->set('msg',"POST DELETADO COM SUCESSO");
			}
			else
			{
			   $this->msg->set('msg',"nao foi possivel deletar este POST");
			}

			return Redirect::to('/posts');

		}
		catch(\Exception $e)
		{
			$this->msg->set('msg',"nao foi possivel deletar" . $e->getMessage());
			return Redirect::to('/posts');
		}
	}



	
}
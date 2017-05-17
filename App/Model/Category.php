<?php 

namespace App\Model;

use App\Model\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categories";
    public $timestamps = false;
    protected $fillable = ['name', 'description'];

    public function post()
    {
    	return $this->belongsToMany(Post::class);
    }

 }
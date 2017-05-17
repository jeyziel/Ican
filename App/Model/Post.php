<?php 

namespace App\Model;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = "posts";

    public $timestamps = false;

    protected $fillable = ['title','content'];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
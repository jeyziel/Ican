<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 20/04/17
 * Time: 18:15
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    public $table = "images";
    protected $fillable = ['imagem'];


}
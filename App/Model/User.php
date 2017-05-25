<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 19/04/17
 * Time: 19:47
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = "users";

    public $timestamps = false;

    protected $fillable = ['nome','email','senha','role'];

}
<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 20/04/17
 * Time: 17:41
 */

namespace App\Controllers;


use App\Model\Image;
use JGFW\GD\Imagem;

class ImagemController
{
    private $imagem;

    public function __construct()
    {
       $this->imagem = new Image();
    }

    public function store()
    {
        if(isset($_FILES['file']))
        {
           $upload = new Imagem($_FILES['file']);
           $upload->upload();

           if(is_null($upload->error))
           {
                $data = ['imagem' => $upload->getName()];
                $this->imagem->create($data);

           }
           else
           {

               echo $upload->error;
           }


        }
    }

    public function findImage($id)
    {
        $find = $this->imagem->find($id);

        $upload = new Imagem();
        $path = $upload->getPath($find->imagem);

        return $path;
    }

    public function remove($id)
    {
       $path = $this->findImage($id);

       $upload = new Imagem();

       if($upload->remove($path))
       {
           echo 'imagem excluida com sucesso';
       }

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 20/04/17
 * Time: 09:07
 */

namespace JGFW\GD;


class Imagem extends Upload
{
    private $accept = array('image/png', 'image/jpeg', 'image/jpg');
    private $file;
    private $width;
    private $folder;
    //private $fileName;
    private $image;
    private $newImage;
    private $path = null;



    public function __construct($imagem = null, $folder = null, $width = null)
    {
        parent::__construct();
        $this->file = $imagem ?? [];
        $this->folder = ($folder ?? 'image');
        $this->width = ( $width ?? 1024);


    }

    public function verificar()
    {

        if(!in_array($this->file['type'],$this->accept))
        {
            return false;
        }
        return true;
    }

    public function checkType()
    {
        switch ($this->file['type'])
        {
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/pjpeg':
                $this->image = imagecreatefromjpeg($this->file['tmp_name']);
            break;
            case 'image/png':
            case 'image/x-png':
                $this->image = imagecreatefrompng($this->file['tmp_name']);
                break;
        }
    }

    private function configure()
    {
        $x = imagesx($this->image);
        $y = imagesy($this->image);
        $imageX = ($this->width < $x ? $this->width : $x);
        $imageH = ($imageX * $y) / $x;

        $this->newImage = imagecreatetruecolor($imageX,$imageH);
        imagealphablending($this->newImage, false);
        imagesavealpha($this->newImage,true);
        imagecopyresampled($this->newImage, $this->image, 0, 0, 0, 0, $imageX, $imageH, $x, $y);

    }

    public function create()
    {
        switch ($this->file['type'])
        {
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/pjpeg':
                imagejpeg($this->newImage,$this->baseDir . $this->send . $this->name);
                break;
            case 'image/png':
            case 'image/x-png':
                imagepng($this->newImage,$this->baseDir . $this->send . $this->name);
            break;
        }



    }

    public function getPath($name)
    {
        //echo __DIR__;
        //echo $this->baseDir . $this->folder;
        $object = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator("./"),
            \RecursiveIteratorIterator::SELF_FIRST);

       foreach ($object as $folder)
       {
           if(is_dir($folder))
           {

               if(file_exists("./{$folder}/$name"))
               {
                   $this->path = "{$folder}/{$name}";
                   break;
               }
           }

       }

       return $this->path;

    }

    public function upload()
    {
        if(!$this->verificar() && $this->file['error'] > 0)
        {

            $this->error = "nao foi possivel realizar o upload";

        }
        else
        {
            $this->checkFolder($this->folder);
            $this->checkType();
            $this->configure();
            $this->setFileName($this->file['name']);
            $this->create();
        }
    }

    public function remove($path)
    {
        if (file_exists($path))
        {
            return unlink($path);
        }

        return false;
    }










}
<?php

namespace JGFW\GD;

abstract class Upload
{

    protected $baseDir;
    protected $send;
    protected $name;
    public $error = null;

    public function __construct($baseDir = null)
    {
        $this->baseDir= ($baseDir ?? "uploads/");

        if (!file_exists($this->baseDir))
        {

            mkdir($this->baseDir,07777);
        }
    }

    protected function checkFolder($folder)
    {
        list($y,$m) = explode('/',date('Y/m'));

        $this->createFolder("{$folder}/");
        $this->createFolder("{$folder}/{$y}/");
        $this->createFolder("{$folder}/{$y}/{$m}/");

        $this->send = "{$folder}/{$y}/{$m}/";



    }

    protected function createFolder($folder)
    {

        if(!file_exists($this->baseDir . $folder))
        {
            echo 'criando file';
            mkdir($this->baseDir . $folder,07777);
        }
    }

    public function setFileName($name)
    {
        $extension = substr($name,strrpos($name,'.'));
        //$fileName = substr($name,0,strrpos($name,'.'));
        $newName = md5(time());

        $this->name = $newName . $extension;

        if(file_exists($this->baseDir . $this->send . $this->name))
        {
            $this->name = $newName . time() . $extension;
        }

        return $this->name;
    }

    public function getName()
    {
        return $this->name;
    }





}
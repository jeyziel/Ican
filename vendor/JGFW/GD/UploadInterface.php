<?php

namespace JGFW\GD;

interface UploadInterface
{
   public function verificar();
   public function getPath($name);
   public function upload();
   public function remove($path);
}
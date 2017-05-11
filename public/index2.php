<?php

require_once __DIR__ . "./../vendor/autoload.php";

require_once __DIR__ . "./../core/bootstrap.php";





?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="file" id="">
        <button type="submit" >enviar</button>
    </form>
    <?php
//    $upload = new \JGFW\GD\Imagem($_FILES['file']);
//    $upload->upload();
//    $imagem =  $upload->getPath("70a8768e8a8e9d6fadb90e165239f1b3.png");

      $imagem = new \App\Controllers\ImagemController();
      $imagem->store();


    ?>
    <img src="<?php echo $imagem->findImage(4) ?>">
</body>
</html>



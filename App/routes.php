<?php

$route->get('/user','site\UserController@index');
$route->post('/user/store','site\UserController@store');
$route->get('/user/{id}/edit','site\UserController@show',['auth']);
$route->get('/user/show/{id}','site\UserController@show',['auth']);



$route->run();
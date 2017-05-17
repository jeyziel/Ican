<?php

$route->get('/','site\HomeController@index');
$route->get('/posts','site\PostsController@index');
$route->get('/post/create','site\PostsController@create');
$route->get('/post/edit/{id}','site\PostsController@edit');
$route->get('/post/delete/{id}','site\PostsController@delete');


$route->post('/post/store','site\PostsController@store');
$route->post('/post/update/{id}','site\PostsController@update');


$route->get('/user','site\UserController@index');
$route->post('/user/store','site\UserController@store');
$route->get('/user/{id}/edit','site\UserController@show',['auth']);
$route->get('/user/show/{id}','site\UserController@show',['auth']);



$route->run();
<?php

$route->get('/','site\HomeController@index');
$route->get('/posts','site\PostsController@index',['auth']);
$route->get('/post/create','site\PostsController@create');
$route->get('/post/edit/{id}','site\PostsController@edit');
$route->get('/post/delete/{id}','site\PostsController@delete');


$route->post('/post/store','site\PostsController@store');
$route->post('/post/update/{id}','site\PostsController@update');


$route->get('/user/create','site\UserController@create');
$route->get('/login','site\UserController@LoginCreate');
$route->get('/logout','site\UserController@logout');

$route->post('/user/store','site\UserController@store');
$route->post('/user/login','site\UserController@Login');
// $route->get('/user/{id}/edit','site\UserController@show',['auth']);
// $route->get('/user/show/{id}','site\UserController@show',['auth']);



$route->run();
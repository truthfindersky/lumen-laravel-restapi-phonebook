<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//registraton
$router->post('/registration', 'RegistrationController@onRegister');

//Login
$router->post('/login', 'LoginController@onLogin');
//access token
$router->post('/tokentest', ['middleware' => 'auth', 'uses' => 'LoginController@tokenTest']);

//CURD
$router->post('/insert', ['middleware' => 'auth', 'uses' => 'PhoneBookController@onInsert']);
$router->post('/select', ['middleware' => 'auth', 'uses' => 'PhoneBookController@onSelect']);
$router->post('/delete', ['middleware' => 'auth', 'uses' => 'PhoneBookController@onDelete']); 
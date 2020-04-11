<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login_user','LoginController@login_user');
$router->get('/profile','LoginController@profile');

$router->group(['prefix' => 'generate'], function () use ($router) {
    $router->get('/key', function() {return \Illuminate\Support\Str::random(32);});
    $router->get('/create_password/{password}','LoginController@create_password');
});

$router->group(['prefix' => 'pegawai'], function () use ($router) {
    $router->get('/','PegawaiController@fetch_all');
    $router->get('/{id}','PegawaiController@get_specify');
    $router->delete('/{id}','PegawaiController@delete_specify');
    $router->post('/store','PegawaiController@store');
    $router->post('/edit/{id}','PegawaiController@edit_specify');
});

$router->group(['prefix' => 'customer'], function() use ($router) {
    $router->get('/','CustomerController@fetch_all');
    $router->get('/{id}','CustomerController@get_specify');
    $router->delete('/{id}','CustomerController@delete_specify');
    $router->post('/store','CustomerController@store');
    $router->post('/edit/{id}','CustomerController@edit_specify');
});

$router->group(['prefix' => 'supplier'], function() use ($router) {
    $router->get('/','SupplierController@fetch_all');
    $router->get('/{id}','SupplierController@get_specify');
    $router->delete('/{id}','SupplierController@delete_specify');
    $router->post('/store','SupplierController@store');
    $router->post('/edit/{id}','SupplierController@edit_specify');
});

$router->group(['prefix' => 'hewan'], function() use ($router) {
    $router->get('/','HewanController@fetch_all');
    $router->post('/store','HewanController@store');
    $router->delete('/{id}','HewanController@delete_specify');
});

$router->group(['prefix' => 'ukuran_hewan'], function() use ($router) {
    $router->get('/','Ukuran_hewanController@fetch_all');
    $router->post('/store','Ukuran_hewanController@store');
    $router->delete('/{id}','Ukuran_hewanController@delete_specify');
});

$router->group(['prefix' => 'jenis_hewan'], function() use ($router) {
    $router->get('/','Jenis_hewanController@fetch_all');
    $router->post('/store','Jenis_hewanController@store');
    $router->delete('/{id}','Jenis_hewanController@delete_specify');
});
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/greeting', function () {
    return '<h1>Hola Crayola</h1>';    
    
});

/*
route::get('/busca-usuario/{id}', function ($id) { 
    return "user".$id;

});
*/
route::get('/busca-usuario/{name}/{lastname?}', function ($name,$lastname=" Bro") { 
    return "user: ".$name ." ".$lastname;

});

route::get("/suma/{num1}/{num2}", function ($num1,$num2) {

    return "resultado= ".$num1 + $num2;

}) ->where(['num1' => '[0-9]+','num2' => '[0-9]+']);


route::get('/vista/{name}', function ($name) { 
    return view('prueba',['name' => $name]);

});

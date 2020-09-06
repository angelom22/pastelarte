<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\User;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('api/users', function(){
   
// });

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/role', 'RoleController')->names('role');

Route::resource('/user', 'UserController',['except' => ['create','store']])->names('user');

// Route::resource('/blog', 'BlogController')->names('blog');
/**
 *  Rutas para los articulos
 */
Route::resource('/blog', 'BlogController')->names([
    'update'   => 'BlogUpdate',
    'create'     => 'BlogCreate',
    'store'       => 'BlogStore',
    'edit'         => 'BlogEdit'
]);


Route::resource('/cursos', 'CursoController')->names('cursos');

Route::resource('/cursosingle', 'CursoSingleController')->names('cursosingle');

Route::resource('/categoria', 'CategoryController')->names('categoria');

Route::resource('/etiqueta', 'TagController')->names('etiqueta');

// Ruta para filtrar las categorias
Route::get('categoria/{slug}', 'BlogController@filtrarCategoria')->name('filtrarCategoria');

// Ruta para filtrar las etiquetas
Route::get('etiqueta/{slug}', 'BlogController@filtrarEtiqueta')->name('filtrarEtiqueta');

Route::resource('/dashboard', 'AdminController')->names('dashboard');

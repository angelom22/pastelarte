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

/**
 *  Rutas para los articulos
 */
Route::resource('/blog', 'BlogController')->names([
    'update'    => 'BlogUpdate',
    'create'    => 'BlogCreate',
    'store'     => 'BlogStore',
    'edit'      => 'BlogEdit',
]);

/**
 *  Rutas para los eventos
 */
Route::resource('/evento', 'EventoController')->names([
    'update'    => 'EventoUpdate',
    'create'    => 'EventoCreate',
    'store'     => 'EventoStore',
    'edit'      => 'EventoEdit',
]);

Route::resource('/contacto', 'ContactoController')->names('contacto');

Route::resource('/cursos', 'CursoController')->names('cursos');


Route::resource('/cursosingle', 'CursoSingleController')->names([
    'cursosingle' => 'cursosingle',

]);

Route::resource('/categoria', 'CategoryController')->names('categoria');

Route::resource('/etiqueta', 'TagController')->names('etiqueta');

// Ruta para filtrar las categorias
Route::get('categorias/{slug}', 'BlogController@filtrarCategoria')->name('filtrarCategoria');

// Ruta para filtrar las etiquetas
Route::get('etiquetas/{slug}', 'BlogController@filtrarEtiqueta')->name('filtrarEtiqueta');

Route::resource('/dashboard', 'AdminController')->names('dashboard');
Route::get('admin/blog', 'AdminController@blog')->name('admin.blog');
Route::get('admin/evento', 'AdminController@evento')->name('admin.evento');

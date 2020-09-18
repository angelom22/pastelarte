<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\User;

Auth::routes();

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
    'update'    => 'EventUpdate',
    'create'    => 'EventCreate',
    'store'     => 'EventStore',
    'edit'      => 'EventEdit',
]);

/**
 *  Rutas para los Cursos
 */
Route::resource('/cursos', 'CursoController')->names([
    'update'    => 'CourseUpdate',
    'create'    => 'CourseCreate',
    'store'     => 'CourseStore',
    'edit'      => 'CourseEdit',
]);

Route::resource('/contacto', 'ContactoController')->names([
    'store'     => 'contactoStore', 
]);

Route::resource('/cursosingle', 'CursoSingleController')->names([
    'cursosingle' => 'cursosingle',
]);

Route::resource('/categoria', 'CategoryController')->names('categoria');

Route::resource('/etiqueta', 'TagController')->names('etiqueta');

// Ruta para filtrar las categorias
Route::get('categorias/{slug}', 'BlogController@filtrarCategoria')->name('filtrarCategoria');

// Ruta para filtrar las etiquetas
Route::get('etiquetas/{slug}', 'BlogController@filtrarEtiqueta')->name('filtrarEtiqueta');

// Rutas de la adminitración
Route::resource('/dashboard', 'AdminController')->names('dashboard');
Route::get('admin/blog', 'AdminController@blog')->name('admin.blog');
Route::get('admin/evento', 'AdminController@evento')->name('admin.evento');
Route::get('admin/curso', 'AdminController@curso')->name('admin.curso');
Route::get('admin/user/{id}', 'AdminController@user')->name('admin.user');

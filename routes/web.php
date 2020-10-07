<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\User;


// DB::listen(function($query){
//     dd($query->sql);
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Ruta para la activacion del usuario
Route::get('activate/{token}', 'UserActivationTokenController@activate')->name('activation');

// Ruta para la asinacion de roles
Route::resource('/role', 'RoleController')->names('role');

// Ruta para la vista administrativa de usuarios
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

/**
 *  Rutas para las carreras
 */
Route::resource('/carrera', 'CarreraController')->names([
    'update'    => 'careerUpdate',
    'create'    => 'careerCreate',
    'store'     => 'careerStore',
    'edit'      => 'careerEdit',]);

/**
 *  Rutas para las lecciones
 */
Route::resource('/lecciones', 'LeccionController')->names([
    'update'            => 'lessonUpdate',
    // 'create/{id}'       => 'lessonCreate',
    'store'             => 'lessonStore',
    'edit'              => 'lessonEdit',
]);
Route::delete('/lecciones/{leccion}', 'LeccionController@destroy')
        ->name('leccion.destroy');

Route::get('crear-leccion/{id}', ['as' => 'crear_leccion', 'uses' => 'LeccionController@create']);

Route::resource('/contacto', 'ContactoController')->names([
    'store'     => 'contactoStore',
]);

Route::resource('/cursosingle', 'CursoSingleController')->names([
    'cursosingle' => 'cursosingle',
]);


Route::resource('/categoria', 'CategoryController')->names('categoria');

Route::resource('/etiqueta', 'TagController')->names('etiqueta');

// Ruta para filtrar las carreras
Route::get('carreras/{slug}', 'CarreraController@filtrarCarrera')->name('filtrarCarrera');

// Ruta para filtrar los cursos
Route::post('cursos/search', 'CursoController@search')->name('cursos.search');

// Ruta para filtrar las categorias
Route::get('categorias/{slug}', 'BlogController@filtrarCategoria')->name('filtrarCategoria');

// Ruta para filtrar las etiquetas
Route::get('etiquetas/{slug}', 'BlogController@filtrarEtiqueta')->name('filtrarEtiqueta');



// Rutas de la adminitración
// Route::get('admin/curso', 'AdminController@curso')->name('admin.curso');
// Route::get('admin/mis-cursos', 'AdminController@mis_cursos')->name('admin.mis-cursos');
// Route::get('admin/micursosingle', 'AdminController@mis_cursossingle')->name('admin.micursosingle');
// Route::get('admin/carrera/', 'AdminController@carrera')->name('carrera.user');
// Route::get('admin/blog', 'AdminController@blog')->name('admin.blog');
// Route::get('admin/evento', 'AdminController@evento')->name('admin.evento');
// Route::get('admin/user/{id}', 'AdminController@user')->name('admin.user');
// Route::get('admin/lecciones/', 'AdminController@leccion')->name('admin.lecciones');

Route::resource('/dashboard', 'AdminController')->names('dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/curso', 'AdminController@curso')->name('curso');
    Route::get('/mis-cursos', 'AdminController@mis_cursos')->name('mis-cursos');
    Route::get('/micursosingle', 'AdminController@mis_cursossingle')->name('micursosingle');
    Route::get('/carrera', 'AdminController@carrera')->name('carrera');
    Route::get('/blog', 'AdminController@blog')->name('blog');
    Route::get('/evento', 'AdminController@evento')->name('evento');
    Route::get('/user/{id}', 'AdminController@user')->name('user');
    Route::get('/lecciones', 'AdminController@leccion')->name('lecciones');

});

// Ruta para los comentarios
Route::post('cursos/{curso}/comentarios', 'ComentarioController@store')->name('cursos.comentarios.store');


// Rutas del check out
Route::resource('/cart', 'PaymentController')->names([
    'update'    => 'CartUpdate',
    'create'    => 'CartCreate',
    'store'     => 'CartStore',
    'edit'      => 'CartEdit',
]);
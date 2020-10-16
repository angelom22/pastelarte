<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\User;


// DB::listen(function($query){
//     dd($query->sql);
// });

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Rutas para el inicio de sesion con facebook
Route::get('login/facebook', 'SocialLoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'SocialLoginController@handleFacebookCallback');

// Ruta para los terminos de seguridad
Route::get('terms', 'HomeController@terms')->name('terminos.privacidad');

Route::post(
    'stripe/webhook',
    'StripeWebHookController@handleWebhook'
);

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
// Ruta para que los estidiantes vean los cursos comprados
Route::get('cursos/{curso}/aprende', 'CursoController@aprende')
        ->name('cursos.aprende')->middleware("can_access_to_course");
// Ruta para la valoración de los cursos
Route::get('cursos/{curso}/review', 'CursoController@createReview')
->name('reviews.create');
Route::post('cursos/{curso}/review', 'CursoController@storeReview')
        ->name('reviews.store');

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

// Rutas para anadir cursos y carreras al carrito de compras
Route::get('/add-curso-to-cart/{curso}', 'UserController@addCursoToCart')->name('add_curso_to_cart');
Route::get('/cart', 'UserController@showCart')->name('cart');
Route::get('/remove-curso-from-cart/{curso}', 'UserController@removeCursoFromCart')->name('remove_curso_from_cart');

Route::post('/apply-coupon', 'UserController@applyCoupon')->name('apply_coupon');

// Ruta para el Checkout 
Route::group(["middleware" => ["auth"]], function () {
    Route::get('/checkout', 'CheckoutController@index')->name('checkout_form');
    Route::post('/checkout', 'CheckoutController@processOrder')->name('process_checkout');
});

// Rutas para los usuarios estudiantes
Route::group(['prefix' => 'estudiante', 'as' => 'estudiante.', 'middleware' => ['auth']], function () {

    Route::get("credit-card", 'BillingController@creditCardForm')->name("billing.credit_card_form");
    Route::post("credit-card", 'BillingController@processCreditCardForm')->name("billing.process_credit_card");

    Route::get('/cursos', 'UserController@cursos')->name('cursos');

    Route::get('/orders', 'UserController@orders')->name('orders');
    Route::get('/orders/{order}', 'UserController@showOrder')->name('orders.show');
    Route::get('/orders/{order}/download_invoice', 'UserController@downloadInvoice')->name('orders.download_invoice');
});
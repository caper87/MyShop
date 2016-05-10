<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('w', function(){
		return view('welcome');
	});
//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Route::get('items/{slug}', 'ItemController@show');
Route::resource('items', 'ItemController');

//Cart
Route::any('cart', ['as' => 'cart.cart', 'uses' =>'CartController@cart']);
Route::get('cartIncr','CartController@cartIncr');
Route::get('cartDecr','CartController@cartDecr');

Route::any('remove-cart','CartController@cartRem');
Route::any('clear-cart','CartController@cartDel');
Route::any('checkout', array('as' => 'checkout.store', 'uses' => 'Admin\OrderController@store'));

//admin panel
Route::group(array( 'prefix'   	  => '/admin',
                    'namespace'   => 'Admin',
                    'middleware'  => ['auth']), 
                       function () {

        // admin cab
        Route::get('/', array('as' => 'admin.home', 'uses' => 'HomeController@index'));
		
		
        // user
        Route::get('users', array('as' => 'admin.users', 'uses' => 'UserController@index'));
        Route::resource('users', 'UserController');
        Route::get('users/{id}/delete', array('as'   => 'admin.users.delete',
                                             'uses' => 'UserController@destroy'));

		Route::resource('items', 'ItemController');
		// posts
	/*	Route::get('posts', array('as' => 'admin.posts', 'uses' => 'PostController@index'));
        Route::resource('posts', 'PostController');
        Route::get('posts/{id}/delete', array('as'   => 'admin.posts.delete',
                                             'uses' => 'PostController@destroy'));
       */
        //cats
        Route::any('cat',['as' => 'admin.cat.index','uses' => 'CatController@index']);
        Route::resource('cat', 'CatController');
        Route::get('cat/{id}/delete', array('as'   => 'admin.cat.delete',
                                             'uses' => 'CatController@destroy'));
        
        //subcats
        Route::any('subcat', 'SubCatController@getSubCatAjax');
        Route::any('subcat/add', 'SubCatController@addSubCatAjax');
        Route::any('subcat/del', 'SubCatController@delSubCatAjax');
                                             
  
});

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


Route::resource('items', 'ItemsController');
<?php

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

Route::get('/login', ['as'=>'login', 'uses'=>'LoginController@auth'])->name("login");
Route::post('/login', 'LoginController@login')->name('auth.login');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/logout', 'LogoutController@perform');

    Route::prefix('admin')->group(function() {
        Route::resource('users', UsersController::class);
        Route::resource('giving-points', GivingPointsController::class);
        Route::resource('peoples', PeoplesController::class);

        Route::get('links', 'LinkController@index');
        Route::post('links/create', 'LinkController@store')->name("links.create");
        Route::delete('links/{link}/destroy', 'LinkController@destroy')->name("links.destroy");


        Route::get('registration', 'RegistrationController@index');
        Route::get('registration/by-data', 'RegistrationController@create')->name("registration.data");
        Route::get('registration/by-phone', 'RegistrationController@createByPhone')->name("registration.phone");
        Route::post('registration/by-data', 'RegistrationController@store')->name("registration.store");
        Route::post('registration/by-phone', 'RegistrationController@storeByPhone')->name("registration.storeByPhone");


        Route::get('people-requests/{status?}', 'PeopleRequestsController@index')->name("people-requests-list");
        Route::get('people-requests/search/{status}', 'PeopleRequestsController@search')->name("people-requests.search");
        Route::put('people-requests/{refugeersRequest}', 'PeopleRequestsController@update')->name("people-requests.update");
        Route::get('people-requests/accept/{refugeersRequest}', 'PeopleRequestsController@accept')->name("people-requests.accept");
        Route::get('people-requests/decline/{refugeersRequest}', 'PeopleRequestsController@decline')->name("people-requests.decline");
        Route::get('people-requests/given/{refugeersRequest}', 'PeopleRequestsController@given')->name("people-requests.given");
        Route::get('people-requests/show/{id}', 'PeopleRequestsController@show')->name("people-requests.show");


    });
});

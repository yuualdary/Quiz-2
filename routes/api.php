<?php


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Auth'

], function ($router) {

  Route::post('register' , 'RegisterController');//done
  Route::post('login' , 'LoginController');//done
  Route::post('logout' , 'LogoutController');//

});


Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'todo',
    'namespace' => 'Api',

], function ($router) {

  Route::get('/' , 'TodoController@index');//done
  Route::post('/' , 'TodoController@store');//done
  Route::post('/change-done-status/{$id}' , 'TodoController@changeDoneStatus');//done
  Route::post('/delete/{$id}' , 'TodoController@delete');//dine

});




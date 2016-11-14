<?php

Route::get('/', [
    'uses' => 'Click\ClickController@makeTable'
]);

Route::get('/click', [
    'middleware' => 'bad.domain', 'as' => 'click', 'uses' => 'Click\ClickController@mainHandler'
]);

Route::get('/success/{ID_CLICK}/{MESSAGE}',[
   'as' => 'success' , 'uses' => 'Click\ClickController@success'
]);

Route::get('/error/{ID_CLICK}/{MESSAGE}',[
    'as' => 'error' , 'uses' => 'Click\ClickController@error'
]);
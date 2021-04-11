<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@showUsersInfo')->name('home');
Route::post('/add-user', 'HomeController@addNewUser')->name('addNewUser');
Route::get('/remove-user/{id}', 'HomeController@removeUser')->name('removeUser');

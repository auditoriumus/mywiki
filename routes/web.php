<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::resource('/data', 'Data\DataController')->names('data')->middleware('auth');

Route::post('/search', 'Search\SearchController@search')->name('search')->middleware('auth');

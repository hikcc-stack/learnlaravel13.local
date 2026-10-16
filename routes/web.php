<?php

use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return "!!!!!!!!!!!!!!!!!";
});

Route::get('/about', function () {
    return "about page";
});
Route::get('/about/{id}', function ($id) {
    return "Номер страницы" . $id;
});

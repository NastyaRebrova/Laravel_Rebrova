<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main.article');
});

Route::get('/about', function () {
    return view('main.about');
});

Route::get('/contact', function () {
    $array = [
        'name' => 'Moscow Polytech',
        'adres' => 'B. Semenovskaya, 38',
        'email' => 'mospolytech@mospolytech.ru',
        'phone' => '8(926)-666-66-66'
    ];
    return view('main.contact', ['contact' => $array]);
});

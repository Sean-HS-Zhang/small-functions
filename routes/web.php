<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Word_Validation;
use App\Http\Controllers\Date;
use App\Http\Controllers\String_Action;
use App\Http\Controllers\Number;
use App\Http\Controllers\XML;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wordValidation/hasDuplicate', [Word_Validation::class, 'hasDuplicate']);
Route::get('/date/parsing', [Date::class, 'parsing']);
Route::get('/stringAction/merge', [String_Action::class, 'merge']);
Route::get('/number/superInt', [Number::class, 'superInt']);
Route::get('/xml/parsing', [XML::class, 'parsing']);
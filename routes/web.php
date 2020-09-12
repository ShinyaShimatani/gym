<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Member;

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

Route::get('/', 'MembersController@index')->name('index');

Route::get('/register', 'MembersController@register')->name('register');

Route::get('/edit', 'MembersController@edit')->name('edit');
Route::post('/update','MembersController@update')->name('update');
Route::get('/delete', 'MembersController@delete')->name('delete');

Route::post('/register/store', "FormController@store")->name("store");
Route::get('/form', "FormController@show")->name("form.show");

//以下削除したルーティング
//Route::post('/store','MembersController@store')->name('store');
//Route::post('/form', "FormController@post")->name("form.post");
//Route::get('/form/confirm', "FormController@confirm")->name("form.confirm");
//Route::post('/form/confirm', "FormController@send")->name("form.send");
//Route::post('form/complete', "FormController@complete");

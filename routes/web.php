<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
})->name('main');

Route::post('insert', [Controller::class, 'index'])->name('insert');
Route::get('list', [Controller::class, 'list'])->name('list');
Route::get('insert/{id}', [Controller::class, 'edit'])->name('edit');
Route::put('update/{id}', [Controller::class, 'update'])->name('update');
Route::get('view/{id}', [Controller::class, 'view'])->name('view');

Route::post('data-insert', [Controller::class, 'store'])->name('store');

Route::get('delete/{id}', [Controller::class, 'delete'])->name('delete');

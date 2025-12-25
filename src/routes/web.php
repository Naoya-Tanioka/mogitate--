<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MogitateController;

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

Route::get('/products', [MogitateController::class, 'index'])->name('products.index');
Route::get('products/register', [MogitateController::class, 'createForm'])->name('products.create');
Route::post('products/register', [MogitateController::class, 'store'])->name('products.store');
Route::get('products/detail/{product}', [MogitateController::class, 'show'])->name('products.show');
Route::put('products/{product}/update', [MogitateController::class, 'update'])->name('products.update');
Route::delete('products/{product}/delete',[MogitateController::class,'destroy'])->name('products.destroy');
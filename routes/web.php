<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VcardController;
use App\Http\Controllers\VcardFrontController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Auth::routes(

);

Route::resource('/vcard', VcardController::class);
Route::get('/thanks',function (){
    return view('thanks');
})->name('thanks');

Route::middleware(['auth'=>'is_admin'])->group(function (){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/vcard/create',[AdminController::class,'create'])->name('admin.create');
    Route::post('/admin/vcard/store',[AdminController::class,'store'])->name('admin.store');
    Route::get('/admin/vcard/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/admin/vcard/update',[AdminController::class,'update'])->name('admin.update');
    Route::delete('/admin/vcard/destroy/{id}',[AdminController::class,'destroy'])->name('admin.destroy');

});




Route::get('/vcard/export', [VcardController::class,'export'])->name('export');




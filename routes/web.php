<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpController;
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
    if(Session('empid'))
    {
        return redirect('/profile');
    }
    return view('home');
})->name('index');

Route::post('/login',[EmpController::class,'login'])->name('login');
Route::group(["middleware"=>'myauth'],function(){
    Route::get('/profile',[EmpController::class,'profile'])->name('profile');
    Route::get('/empform/{id?}',[EmpController::class,'empform'])->name('empform');
    Route::post('/formsubmit',[EmpController::class,'formsubmit'])->name('formsubmit');
});
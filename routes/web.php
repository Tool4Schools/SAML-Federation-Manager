<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\OrganisationController;
Use App\Http\Controllers\EntityController;
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

Route::get('auth/login',function (){
    return 'show login form';
})->name('login');

Route::get('organisation/registration',[OrganisationController::class,'create']);
Route::post('organisation/registration',[OrganisationController::class,'store']);

Route::middleware('auth')->group(function() {


Route::resource('organisation',OrganisationController::class);
Route::resource('entity',EntityController::class);
});

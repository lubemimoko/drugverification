<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\AdminController; 
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

Route::view('/', 'search')->name("home.index");
Route::view('/contact', 'contact')->name("home.contact");

Route::get('/home', function () { 
    Auth::logout();
    return view('search');
})->name("home.home");
Route::get('/logout',  function() {
    Auth::logout();
    return view('search');
  })->name("home.logout");


Route::get("/authenticate", [AuthenticateController::class, "index"])->name("home.auth");

Route::post("/user/drugs/{id}", [DrugController::class, "search"])->name("drugs.search1");
Route::get("/user/drugs/{id}", [DrugController::class, "search2"])->name("drugs.search1");
Route::post("/user/drugs/{id}/edit", [DrugController::class, "search2"])->name("drugs.search2");
Route::get("/user/complain", [ComplainController::class, 'index2'])->name("usercomplain.show");
Route::get("/user/complain/{id}", [ComplainController::class, 'show'])->name("usersinglecomplain.show");
Route::get("user/company", [CompanyController::class, 'index'])->name("usercompany.index");
Route::post("user/company", [CompanyController::class, 'store'])->name("usercompany.store");
Route::get("/user/complain/drug/create", [ComplainController::class, 'create'])->name("usercomplain.create");
Route::post("/user/complain/drug/", [ComplainController::class, 'store'])->name("usercomplain.store");


Auth::routes();

Route::group(['middleware'=> 'auth'], function(){

    Route::Resource("/company", CompanyController::class);
    Route::Resource("/complain", ComplainController::class);
    Route::Resource("/drugs", DrugController::class);
    Route::get("/complaindrugs", [ComplainController::class, 'show3'])->name("complaindrugs.show");


    Route::group(['middleware'=> 'isAdmin', 'prefix' => 'admin'], function(){
        Route::get("/company/{id}", [CompanyController::class, 'show2'])->name("admincompany.show");
        Route::put("/company/{id}", [CompanyController::class, 'update2'])->name("admincompany.update");
        Route::get("/companies/{id}", [AdminController::class, 'Company'])->name("admincompany.company");
        Route::get("/companies/drugs/{id}", [AdminController::class, 'drugs'])->name("admincompany.drugs");
        Route::get("/complains/{id}", [AdminController::class, 'complains'])->name("admincompany.complains");
        Route::get('/index', [AdminController::class, 'home'])->name("admin.home");
    });

});


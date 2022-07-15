<?php

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
});


//admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    // Route::get('/', function () {
    //     return view('admin');
    // });
    // Route::get('/rolespage', [App\Http\Controllers\HomeController::class, 'rolespage'])->name('rolespage');
    Route::get('/userspage', [App\Http\Controllers\HomeController::class, 'userspage'])->name('userspage');
    //ROLE
    Route::get('/rolespage', 'RolesController@index')->name('list');
    Route::post('/rolespage', 'RolesController@store')->name('submitRole');
    Route::get('/edit/{id}', 'RolesController@edit')->name('editRole');
    Route::post('/update/{id}', 'RolesController@update')->name('updateRole');
    Route::get('/delete/{id}', 'RolesController@destroy')->name('deleteRole');
    //USER
    Route::get('/userspage', 'UserController@index')->name('userList');
    Route::get('/editpage/{id}', 'UserController@edit')->name('editUser');
    Route::post('/updatepage/{id}', 'UserController@update')->name('updateUser');
    Route::get('/deletepage/{id}', 'UserController@destroy')->name('deleteUser');
    //EXPENSE CATEGORY
    Route::post('/expcatpage', 'ExpCatController@store')->name('submitExpCat');
    Route::get('/expcatpage', 'ExpCatController@index')->name('expCatList');
    Route::get('/editexpcat/{id}', 'ExpCatController@edit')->name('editExpCat');
    Route::post('/updateexpcat/{id}', 'ExpCatController@update')->name('updateExpCat');
    //EXPENSES

});

Route::get('/dboard', [App\Http\Controllers\HomeController::class, 'dboard'])->name('dboard');

    Route::get('/exppage', 'ExpController@index')->name('expList');
    Route::post('/exppage', 'ExpController@store')->name('submitExp');
    Route::get('/editexppage/{id}', 'ExpController@edit')->name('editExp');
    Route::post('/updateexppage/{id}', 'ExpController@update')->name('updateExp');
    // Route::get('/expcatpage', [App\Http\Controllers\HomeController::class, 'expcatpage'])->name('expcatpage');
    // Route::get('/exppage', [App\Http\Controllers\HomeController::class, 'exppage'])->name('exppage');
    Route::get('/editrole', [App\Http\Controllers\HomeController::class, 'editrole'])->name('editrole');
    // Route::get('/editexpcat', [App\Http\Controllers\HomeController::class, 'editexpcat'])->name('editexpcat');
    Route::get('/editexp', [App\Http\Controllers\HomeController::class, 'editexp'])->name('editexp');

    Route::get('/dboard', 'DashboardController@index')->name('dboard');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

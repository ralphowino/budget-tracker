<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/about', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('accounts', 'AccountsController');
    Route::resource('budgets', 'BudgetsController');
    Route::resource('points', 'BudgetPointsController');
    Route::resource('budgets/{bid}/plans', 'BudgetPlansController');
});

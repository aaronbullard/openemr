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

// Route::resource('users', 'UserController');
Route::resource('patients', 'PatientController');
Route::resource('patients.notes', 'PatientNoteController');
// Route::resource('appointments', 'AppointmentController');
// Route::post('appointments/{apptId}', 'AppointmentController@update');
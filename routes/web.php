<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//MEDICS
Route::get('/medicos/', 'MedicController@show')->name('show-medics');

//AUDITORS
Route::get('/auditores/', 'AuditorController@show')->name('show-auditors');


//AUDITS
Route::get('/auditorias/', 'AuditController@show')->name('show-audits');
Route::get('/auditoria/{audit}', 'AuditController@detail')->name('audit-detail');


//PATIENTS
Route::get('/pacientes/', 'PatientController@show')->name('show-patients');

//INSTRUCTIONS
Route::get('/instrucciones/', 'InstructionController@show')->name('show-instructions');

//OBJECTIVES
Route::get('/objetivos/', 'ObjectiveController@show')->name('show-objectives');

//RECOMMENDATIONS
Route::get('/recomendaciones/', 'RecommendationController@show')->name('show-recommendations');

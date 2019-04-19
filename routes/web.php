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

//PERFIL USUARIO
Route::get('/perfil','UserController@show')->name('profile-show');
// Route::post('/perfil','UserController@save')->name('profile-save');
Route::get('/perfil/{user}/editar','UserController@edit')->name('profile-edit');
Route::post('/perfil/{user}/editar','UserController@update')->name('profile-update');

//INVITACIONES
Route::get('/invitar','InviteController@invite')->name('invite');
Route::post('/invitar', 'InviteController@process')->name('process');
Route::get('/aceptar/{token}','InviteController@accept')->name('accept');

//DASHBOARD INICIO
Route::get('/home', 'HomeController@index')->name('home');

//MEDICS
Route::get('/medicos/', 'MedicController@show')->name('show-medics');
Route::get('/medicos/exportar', 'MedicController@export')->name('export-medics');

//AUDITORS
Route::get('/auditores/', 'AuditorController@show')->name('show-auditors');
Route::get('/auditores/exportar', 'AuditorController@export')->name('export-auditors');



//PATIENTS
Route::get('/pacientes/', 'PatientController@show')->name('show-patients');
Route::get('/pacientes/exportar', 'PatientController@export')->name('export-patients');

//INSTRUCTIONS
Route::get('/instrucciones/', 'InstructionController@show')->name('show-instructions');
Route::get('/instrucciones/nueva', 'InstructionController@new')->name('new-instructions');
Route::post('/instrucciones/nueva', 'InstructionController@save')->name('save-instructions');
Route::get('/instrucciones/{instruction}/editar/', 'InstructionController@edit')->name('edit-instructions');
Route::post('/instrucciones/{instruction}/editar/', 'InstructionController@update')->name('update-instructions');
Route::get('/instrucciones/{instruction}/eliminar/', 'InstructionController@delete')->name('delete-instructions');

//OBJECTIVES
Route::get('/objetivos/', 'ObjectiveController@show')->name('show-objectives');
Route::get('/objetivos/nuevo', 'ObjectiveController@new')->name('new-objectives');
Route::post('/objetivos/nuevo', 'ObjectiveController@save')->name('save-objectives');
Route::get('/objetivos/{objective}/editar/', 'ObjectiveController@edit')->name('edit-objectives');
Route::post('/objetivos/{objective}/editar/', 'ObjectiveController@update')->name('update-objectives');
Route::get('/objetivos/{objective}/eliminar/', 'ObjectiveController@delete')->name('delete-objectives');

//RECOMMENDATIONS
Route::get('/recomendaciones/', 'RecommendationController@show')->name('show-recommendations');
Route::get('/recomendaciones/nueva', 'RecommendationController@new')->name('new-recommendations');
Route::post('/recomendaciones/nueva', 'RecommendationController@save')->name('save-recommendations');
Route::get('/recomendaciones/{recommendation}/editar/', 'RecommendationController@edit')->name('edit-recommendations');
Route::post('/recomendaciones/{recommendation}/editar/', 'RecommendationController@update')->name('update-recommendations');
Route::get('/recomendaciones/{recommendation}/eliminar/', 'RecommendationController@delete')->name('delete-recommendations');

//MODULE TYPE
Route::get('/tiposdemodulo/', 'ModueTypeController@show')->name('show-moduletypes');

//MODULE CATEGORY
Route::get('/categoriasdemodulo/', 'ModueleCategoryController@show')->name('show-modulecategories');

//MODULE
Route::get('/modulos/', 'ModueleController@show')->name('show-module');

//STATUS
Route::get('/estados/', 'StatusController@show')->name('show-status');
Route::get('/estados/nuevo', 'StatusController@new')->name('new-status');
Route::post('/estados/nuevo', 'StatusController@save')->name('save-status');
Route::get('/estados/{status}/editar/', 'StatusController@update')->name('edit-status');
Route::post('/estados/{status}/editar/', 'StatusController@edit')->name('update-status');
Route::get('/estados/{status}/eliminar/', 'StatusController@delete')->name('delete-status');



//AUDITS
Route::get('/auditorias/', 'AuditController@show')->name('show-audits');
Route::get('/auditoria/nueva/', 'AuditController@new')->name('new-audit');
Route::post('/auditoria/nueva/', 'AuditController@save')->name('create-audit');


Route::get('/auditoria/{audit}/detalle/expediente/', 'AuditController@detailExpedient')->name('audit-detail-expedient');

Route::get('/auditoria/{audit}/detalle/objetivos-instrucciones/', 'AuditController@detailObjectives')->name('audit-detail-objectives');

Route::get('/auditoria/{audit}/detalle/informe-auditor/', 'AuditController@detailAuditor')->name('audit-detail-auditor');

Route::get('/auditoria/{audit}/detalle/conclusion/', 'AuditController@detailConclution')->name('audit-detail-conclution');

Route::get('/auditoria/{audit}/detalle/historial/', 'AuditController@detailHistory')->name('audit-detail-history');

Route::get('/auditorias/exportar', 'AuditController@export')->name('export-audits');

Route::post('/auditoria/{audit}/detalle/paciente/', 'AuditController@detailPatientSave')->name('audit-detail-patient-save');
Route::get('/auditoria/{audit}/detalle/paciente/', 'AuditController@detailPatient')->name('audit-detail-patient');

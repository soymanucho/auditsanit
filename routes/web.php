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


//TIPOS INDICACION
Route::get('/tipos-indicacion/', 'IndicationTypeController@show')->name('show-indicationType');
Route::get('/tipos-indicacion/nuevo', 'IndicationTypeController@new')->name('new-indicationType');
Route::post('/tipos-indicacion/nuevo', 'IndicationTypeController@save')->name('save-indicationType');
Route::get('/tipos-indicacion/{indicationType}/editar/', 'IndicationTypeController@edit')->name('edit-indicationType');
Route::post('/tipos-indicacion/{indicationType}/editar/', 'IndicationTypeController@update')->name('update-indicationType');
Route::get('/tipos-indicacion/{indicationType}/eliminar/', 'IndicationTypeController@delete')->name('delete-indicationType');

//TIPOS DIAGNOSTICO
Route::get('/tipos-diagnostico/', 'DiagnosisTypeController@show')->name('show-diagnosisType');
Route::get('/tipos-diagnostico/nuevo', 'DiagnosisTypeController@new')->name('new-diagnosisType');
Route::post('/tipos-diagnostico/nuevo', 'DiagnosisTypeController@save')->name('save-diagnosisType');
Route::get('/tipos-diagnostico/{diagnosisType}/editar/', 'DiagnosisTypeController@edit')->name('edit-diagnosisType');
Route::post('/tipos-diagnostico/{diagnosisType}/editar/', 'DiagnosisTypeController@update')->name('update-diagnosisType');
Route::get('/tipos-diagnostico/{diagnosisType}/eliminar/', 'DiagnosisTypeController@delete')->name('delete-diagnosisType');

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

//VENDORS
Route::get('/prestadores/', 'VendorController@show')->name('show-vendors');
Route::get('/prestadores/nuevo', 'VendorController@new')->name('new-vendors');
Route::post('/prestadores/nuevo', 'VendorController@save')->name('save-vendors');
Route::get('/prestadores/{vendor}/editar/', 'VendorController@edit')->name('edit-vendors');
Route::post('/prestadores/{vendor}/editar/', 'VendorController@update')->name('update-vendors');
Route::get('/prestadores/{vendor}/eliminar/', 'VendorController@delete')->name('delete-vendors');

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
Route::get('/tiposdemodulo/nuevo', 'ModueTypeController@new')->name('new-moduletype');
Route::post('/tiposdemodulo/nuevo', 'ModueTypeController@save')->name('save-moduletype');
Route::get('/tiposdemodulo/{moduleType}/editar/', 'ModueTypeController@edit')->name('edit-moduletype');
Route::post('/tiposdemodulo/{moduleType}/editar/', 'ModueTypeController@update')->name('update-moduletype');
Route::get('/tiposdemodulo/{moduleType}/eliminar/', 'ModueTypeController@delete')->name('delete-moduletype');

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
Route::get('/auditoria/{audit}/detalle/objetivos-instrucciones/editar', 'AuditController@detailObjectives')->name('edit-audit-detail-objectives');
Route::post('/auditoria/{audit}/detalle/objetivos-instrucciones/editar', 'AuditController@detailObjectives')->name('save-audit-detail-objectives');

Route::get('/auditoria/{audit}/detalle/informe-auditor/', 'AuditController@detailAuditor')->name('audit-detail-auditor');
Route::get('/auditoria/{audit}/detalle/informe-auditor/editar', 'AuditController@detailAuditorEdit')->name('edit-audit-detail-auditor');
Route::post('/auditoria/{audit}/detalle/informe-auditor/editar', 'AuditController@detailAuditorSave')->name('save-audit-detail-auditor');

Route::get('/auditoria/{audit}/detalle/conclusion/', 'AuditController@detailConclution')->name('audit-detail-conclution');
Route::get('/auditoria/{audit}/detalle/conclusion/editar', 'AuditController@detailConclutionEdit')->name('edit-audit-detail-conclution');
Route::post('/auditoria/{audit}/detalle/conclusion/editar', 'AuditController@detailConclutionSave')->name('save-audit-detail-conclution');

Route::get('/auditoria/{audit}/detalle/historial/', 'AuditController@detailHistory')->name('audit-detail-history');

Route::get('/auditoria/{audit}/detalle/resumen/', 'AuditController@detailResume')->name('audit-detail-resume');

Route::get('/auditorias/exportar', 'AuditController@export')->name('export-audits');

Route::post('/auditoria/{audit}/detalle/paciente/', 'AuditController@detailPatientSave')->name('audit-detail-patient-save');
Route::get('/auditoria/{audit}/detalle/paciente/', 'AuditController@detailPatient')->name('audit-detail-patient');

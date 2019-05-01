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


Route::group(['middleware' => ['role:Administrador|Backoffice']], function () {

  //INDICATION
  Route::get('auditoria/{audit}/indicacion/nuevo', 'IndicationController@new')->name('new-indication');
  Route::get('/indicacion/{indication}/delete', 'IndicationController@delete')->name('delete-indication');
  Route::post('auditoria/{audit}/indicacion/nuevo', 'IndicationController@save')->name('save-indication');

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

  //MEDICS
  Route::get('/medicos/', 'MedicController@show')->name('show-medics');
  Route::get('/medicos/exportar', 'MedicController@export')->name('export-medics');

  //AUDITORS
  Route::get('/auditores/', 'AuditorController@show')->name('show-auditors');
  Route::get('/auditores/exportar', 'AuditorController@export')->name('export-auditors');

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

  //PERFIL USUARIO
  Route::get('/usuarios','UserController@show')->name('users-show');
  Route::get('/usuarios/{user}/editar-rol','UserController@editRole')->name('users-edit-role');
  Route::post('/usuarios/{user}/editar-rol','UserController@updateRole')->name('users-update-role');

  //PERFIL
  Route::get('/perfil','UserController@detail')->name('profile-show');
  // Route::post('/perfil','UserController@save')->name('profile-save');
  Route::get('/perfil/{user}/editar','UserController@edit')->name('profile-edit');
  Route::post('/perfil/{user}/editar','UserController@update')->name('profile-update');

  //INVITACIONES
  Route::get('/invitar','InviteController@invite')->name('invite');
  Route::post('/invitar', 'InviteController@process')->name('process');
  Route::get('/aceptar/{token}','InviteController@accept')->name('accept');

  //CLIENTS
  Route::get('/clientes/', 'ClientController@show')->name('show-clients');
  Route::get('/clientes/nuevo', 'ClientController@new')->name('new-clients');
  Route::post('/clientes/nuevo', 'ClientController@save')->name('save-clients');
  Route::get('/clientes/{client}/editar/', 'ClientController@edit')->name('edit-clients');
  Route::post('/clientes/{client}/editar/', 'ClientController@update')->name('update-clients');
  Route::get('/clientes/{client}/eliminar/', 'ClientController@delete')->name('delete-clients');

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
  Route::get('/categoriasdemodulo/nuevo', 'ModueleCategoryController@new')->name('new-modulecategory');
  Route::post('/categoriasdemodulo/nuevo', 'ModueleCategoryController@save')->name('save-modulecategory');
  Route::get('/categoriasdemodulo/{modulecategory}/editar/', 'ModueleCategoryController@edit')->name('edit-modulecategory');
  Route::post('/categoriasdemodulo/{modulecategory}/editar/', 'ModueleCategoryController@update')->name('update-modulecategory');
  Route::get('/categoriasdemodulo/{modulecategory}/eliminar/', 'ModueleCategoryController@delete')->name('delete-modulecategory');

  //MODULE
  Route::get('/modulos/', 'ModueleController@show')->name('show-module');
  Route::get('/modulos/tipo/{moduleType}/categoria/{moduleCategory}/editar', 'ModueleController@edit')->name('edit-module');
  Route::post('/modulos/tipo/{moduleType}/categoria/{moduleCategory}/editar', 'ModueleController@update')->name('update-module');
  Route::get('/modulos/tipo/{moduleType}/categoria/{moduleCategory}/nuevo', 'ModueleController@new')->name('new-module');
  Route::post('/modulos/tipo/{moduleType}/categoria/{moduleCategory}/nuevo', 'ModueleController@save')->name('save-module');
});


//DASHBOARD INICIO
Route::get('/home', 'HomeController@index')->name('home');

//MODULE-EXPEDIENT
Route::get('/audit/{audit}/agregarModuloAExpediente', 'ModueleExpedientController@addModuleToAudit')->name('add-module-expedient');
Route::post('/audit/{audit}/agregarModuloAExpediente', 'ModueleExpedientController@saveModuleToAudit')->name('save-module-expedient');
Route::get('/moduloExpediente/{expedientModule}/delete', 'ModueleExpedientController@delete')->name('delete-module-expedient');

//MEDICAL SERVICE
Route::get('/moduloExpediente/{moduleExpedient}/prestacion/nuevo', 'MedicalServiceController@new')->name('new-medical-service');
Route::post('/moduloExpediente/{moduleExpedient}/prestacion/nuevo', 'MedicalServiceController@save')->name('save-medical-service');
Route::get('/moduloExpediente/{medicalService}/prestacion/delete', 'MedicalServiceController@delete')->name('delete-medical-service');

Route::get('/prestaciones/mis-pendientes', 'MedicalServiceController@myPendings')->name('show-audior-asigned-services');
Route::get('/prestacion/{medicalService}/aceptar', 'MedicalServiceController@accept')->name('accept-asigned-service');
Route::get('/prestacion/{medicalService}/rechazar', 'MedicalServiceController@decline')->name('decline-asigned-service');

Route::get('/medicalService/{medicalService}/reasignarAuditor', 'MedicalServiceController@editAuditor')->name('reasign-auditor-medical-service');
Route::post('/medicalService/{medicalService}/reasignarAuditor', 'MedicalServiceController@updateAuditor')->name('update-auditor-medical-service');

//STATUS
Route::get('/estados/', 'StatusController@show')->name('show-status');
Route::get('/estados/nuevo', 'StatusController@new')->name('new-status');
Route::post('/estados/nuevo', 'StatusController@save')->name('save-status');
Route::get('/estados/{status}/editar/', 'StatusController@update')->name('edit-status');
Route::post('/estados/{status}/editar/', 'StatusController@edit')->name('update-status');
Route::get('/estados/{status}/eliminar/', 'StatusController@delete')->name('delete-status');

//UPDATE-STATUS-AUDIT
Route::post('/auditoria/{audit}/estado/{status}/actualizar/', 'AuditController@updateStatus')->name('update-status-audit')->middleware('can:audit-edit-history');

//COMMENTS
Route::post('/auditoria/{audit}/agregar-comentario/', 'CommentController@add')->name('add-comment');


//AUDITS
Route::get('/auditorias/', 'AuditController@show')->name('show-audits');
Route::get('/auditoria/nueva/', 'AuditController@new')->name('new-audit')->middleware('can:audit-create');
Route::post('/auditoria/nueva/', 'AuditController@save')->name('create-audit')->middleware('can:audit-create');


Route::get('/auditoria/{audit}/detalle/expediente/', 'AuditController@detailExpedient')->name('audit-detail-expedient')->middleware('can:audit-read-expedient');
Route::post('/auditoria/{audit}/detalle/expediente/', 'AuditController@updateExpedient')->name('update-expedient')->middleware('can:audit-edit-expedient');


Route::get('/auditoria/{audit}/detalle/objetivos-instrucciones/', 'AuditController@detailObjectives')->name('audit-detail-objectives')->middleware('can:audit-read-objectives');
Route::post('/auditoria/{audit}/detalle/objetivos-instrucciones/', 'AuditController@updateObjectives')->name('update-objectives')->middleware('can:audit-edit-objectives');

Route::get('/auditoria/{audit}/detalle/informe-auditor/', 'AuditController@detailAuditor')->name('audit-detail-auditor')->middleware('can:audit-read-report');
Route::post('/auditoria/{audit}/detalle/informe-auditor/', 'AuditController@updateReport')->name('update-report')->middleware('can:audit-edit-report');

Route::get('/auditoria/{audit}/detalle/conclusion/', 'AuditController@detailConclution')->name('audit-detail-conclution')->middleware('can:audit-read-conclution');
Route::post('/auditoria/{audit}/detalle/conclusion/', 'AuditController@updateConclution')->name('update-conclution')->middleware('can:audit-edit-conclution');

Route::get('/auditoria/{audit}/detalle/historial/', 'AuditController@detailHistory')->name('audit-detail-history')->middleware('can:audit-read-history');

Route::get('/auditoria/{audit}/detalle/resumen/', 'AuditController@detailResume')->name('audit-detail-resume')->middleware('can:audit-read-resume');
Route::get('/auditoria/{audit}/detalle/resumen/imprimir', 'AuditController@detailResumePrint')->name('audit-resume-print');

Route::get('/auditorias/exportar', 'AuditController@export')->name('export-audits')->middleware('can:audit-export');


Route::get('/auditoria/{audit}/detalle/paciente/', 'AuditController@detailPatient')->name('audit-detail-patient')->middleware('can:audit-read-patient');


//PATIENTS
Route::get('/afiliados/', 'PatientController@show')->name('show-patients');
Route::get('/afiliados/exportar', 'PatientController@export')->name('export-patients');
Route::get('/afiliados/nuevo', 'PatientController@new')->name('new-patients');
Route::post('/afiliados/nuevo', 'PatientController@save')->name('save-patients');
Route::get('/afiliados/{patient}/editar/', 'PatientController@edit')->name('edit-patients')->middleware('can:audit-read-patient');
Route::post('/afiliados/{patient}/editar/', 'PatientController@update')->name('update-patients')->middleware('can:audit-edit-patient');

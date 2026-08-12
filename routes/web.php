<?php

use Illuminate\Support\Facades\Auth;
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
// ROUTES FRONTEND
Route::get('/', 'WebController@index')->name('index');
Route::get('gacetas', 'WebController@gaceta')->name('gacetas');
Route::get('gacetas/leyes-municipales', 'WebController@leyes_municipales')->name('leyes-municipales');
Route::get('gacetas/resoluciones-municipales', 'WebController@resoluciones_municipales')->name('resoluciones-municipales');
Route::get('gacetas/resoluciones-mun-adm', 'WebController@resoluciones_mun_adm')->name('resoluciones-mun-adm');
Route::get('gacetas/decretos-ediles', 'WebController@decretos_ediles')->name('decretos-ediles');
Route::get('gacetas/auditoria-interno', 'WebController@auditoria_interno')->name('auditoria-interna');
Route::get('gacetas/informes-gestion', 'WebController@informes_gestion')->name('informes-gestion');
Route::get('gacetas/documentos_importantes', 'WebController@documentos_importantes')->name('documentos_importantes');
Route::get('transparencia', 'WebController@transparencia')->name('transparencia');
Route::get('actividades', 'WebController@actividades')->name('actividades');
Route::get('noticias', 'WebController@noticias')->name('noticias');
Route::get('noticias/{detail}', 'WebController@details')->name('details');
Route::get('cultura', 'WebController@cultura')->name('cultura');
Route::get('turismo', 'WebController@turismo')->name('turismo');
Route::get('zoonosis', 'WebController@zoonosis')->name('zoonosis');
Route::get('subalcaldias', 'WebController@subalcaldias')->name('subalcaldias');
Route::get('proyectos', 'WebController@proyectos')->name('proyectos');
Route::get('employee/autoridades', 'WebController@rhautoridades')->name('autoridades');
Route::get('employee/personal', 'WebController@rhpersonal')->name('personal');
Route::get('employee/essa', 'WebController@rhessa')->name('escala-salarial');
Route::get('employee/documentos', 'WebController@rhdocumentos')->name('documentos');
Route::get('alcalde', 'WebController@alcalde')->name('alcalde');
// Route::get('contacts', 'WebController@contact')->name('contacts.create');
Route::post('contacts', 'WebController@store')->name('contacts.store');
// ROUTES BACKEND
Auth::routes();
Route::get('/home', 'ProfileUserController@index')->name('home');
Route::get('profile', 'ProfileUserController@profile')->name('profile.index');
Route::post('profile', 'ProfileUserController@updates_avatar');
Route::put('profile/{user}', 'ProfileUserController@updates_password')->name('profile.update');
// Route::resource('user', 'User\UserController');
// Route::resource('doc', 'Document\DocumentController',['parameters'=>['doc'=>'document']]);
// Route::resource('news', 'Newpage\NewpageController',['parameters'=>['news'=>'newpage']]);
Route::get('cat/create', 'CategorieController@create')->name('cat.create');
Route::post('cat', 'CategorieController@store')->name('cat.store');
Route::delete('cat/{categorie}', 'CategorieController@destroy')->name('cat.destroy');
Route::middleware(['auth'])->group(function () {
	Route::get('contacts', 'WebController@vista')->name('contacts.index')
		->middleware('permission:contacts.index');
	Route::get('employees', 'EmployeeController@index')->name('employees.index')
		->middleware('permission:employees.index');
	Route::get('employees/create', 'EmployeeController@create')->name('employees.create')
		->middleware('permission:employees.create');
	Route::post('employees', 'EmployeeController@store')->name('employees.store')
		->middleware('permission:employees.store');
	Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.show')
		->middleware('permission:employees.show');
	Route::get('employees/{employee}/edit', 'EmployeeController@edit')->name('employees.edit')
		->middleware('permission:employees.edit');
	Route::put('employees/{employee}', 'EmployeeController@update')->name('employees.update')
		->middleware('permission:employees.update');
	Route::delete('employees/{employee}', 'EmployeeController@destroy')->name('employees.destroy')
		->middleware('permission:employees.destroy');
	Route::get('salaries', 'SalarieController@index')->name('salaries.index')
		->middleware('permission:salaries.index');
	Route::get('salaries/create', 'SalarieController@create')->name('salaries.create')
		->middleware('permission:salaries.create');
	Route::post('salaries', 'SalarieController@store')->name('salaries.store')
		->middleware('permission:salaries.store');
	Route::get('salaries/{salarie}', 'SalarieController@show')->name('salaries.show')
		->middleware('permission:salaries.show');
	Route::get('salaries/{salarie}/edit', 'SalarieController@edit')->name('salaries.edit')
		->middleware('permission:salaries.edit');
	Route::put('salaries/{salarie}', 'SalarieController@update')->name('salaries.update')
		->middleware('permission:salaries.update');
	Route::delete('salaries/{salarie}', 'SalarieController@destroy')->name('salaries.destroy')
		->middleware('permission:salaries.destroy');
	Route::get('newpages', 'Newpage\NewpageController@index')->name('newpages.index')
		->middleware('permission:newpages.index');
	Route::get('newpages/create', 'Newpage\NewpageController@create')->name('newpages.create')
		->middleware('permission:newpages.create');
	Route::post('newpages', 'Newpage\NewpageController@store')->name('newpages.store')
		->middleware('permission:newpages.create');
	Route::get('newpages/{newpage}', 'Newpage\NewpageController@show')->name('newpages.show')
		->middleware('permission:newpages.show');
	Route::get('newpages/{newpage}/edit', 'Newpage\NewpageController@edit')->name('newpages.edit')
		->middleware('permission:newpages.edit');
	Route::put('newpages/{newpage}', 'Newpage\NewpageController@update')->name('newpages.update')
		->middleware('permission:newpages.edit');
	Route::delete('newpages/{newpage}', 'Newpage\NewpageController@destroy')->name('newpages.destroy')
		->middleware('permission:newpages.destroy');
	// Cultura (cronogramas y actividades)
	Route::get('culturas', 'Cultura\CulturaController@index')->name('cultura.index')
		->middleware('permission:cultura.index');
	Route::get('culturas/create', 'Cultura\CulturaController@create')->name('cultura.create')
		->middleware('permission:cultura.create');
	Route::post('culturas', 'Cultura\CulturaController@store')->name('cultura.store')
		->middleware('permission:cultura.create');
	Route::get('culturas/{document}', 'Cultura\CulturaController@show')->name('cultura.show')
		->middleware('permission:cultura.show');
	Route::get('culturas/{document}/edit', 'Cultura\CulturaController@edit')->name('cultura.edit')
		->middleware('permission:cultura.edit');
	Route::put('culturas/{document}', 'Cultura\CulturaController@update')->name('cultura.update')
		->middleware('permission:cultura.edit');
	Route::delete('culturas/{document}', 'Cultura\CulturaController@destroy')->name('cultura.destroy')
		->middleware('permission:cultura.destroy');
	Route::get('culturas/{document}/publish', 'Cultura\CulturaController@publish')->name('cultura.publish')
		->middleware('permission:cultura.edit');
	Route::get('projects', 'DraftController@index')->name('projects.index')
		->middleware('permission:projects.index');
	Route::get('projects/create', 'DraftController@create')->name('projects.create')
		->middleware('permission:projects.create');
	Route::post('projects', 'DraftController@store')->name('projects.store')
		->middleware('permission:projects.store');
	Route::get('projects/{draft}', 'DraftController@show')->name('projects.show')
		->middleware('permission:projects.show');
	Route::get('projects/{draft}/edit', 'DraftController@edit')->name('projects.edit')
		->middleware('permission:projects.edit');
	Route::put('projects/{draft}', 'DraftController@update')->name('projects.update')
		->middleware('permission:projects.update');
	Route::delete('projects/{draft}', 'DraftController@destroy')->name('projects.destroy')
		->middleware('permission:projects.destroy');
	// Route for asociation in edition
	Route::get('admins/{user}/edit', 'AdminAsociationController@editadmin')->name('admins.edit')
		->middleware('permission:admins.edit');
	Route::put('admins/{user}', 'AdminAsociationController@updateadmin')->name('admins.update')
		->middleware('permission:admins.update');
	//Role
	Route::post('roles/store', 'Role\RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');
	Route::get('roles', 'Role\RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');
	Route::get('roles/create', 'Role\RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');
	Route::put('roles/{role}', 'Role\RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');
	Route::get('roles/{role}', 'Role\RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');
	Route::delete('roles/{role}', 'Role\RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');
	Route::get('roles/{role}/edit', 'Role\RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');
	//Document
	Route::post('doc/store', 'Document\DocumentController@store')->name('doc.store')
		->middleware('permission:doc.create');
	Route::get('doc', 'Document\DocumentController@index')->name('doc.index')
		->middleware('permission:doc.index');
	Route::get('doc/create', 'Document\DocumentController@create')->name('doc.create')
		->middleware('permission:doc.create');
	Route::put('doc/{document}', 'Document\DocumentController@update')->name('doc.update')
		->middleware('permission:doc.edit');
	Route::get('doc/{document}', 'Document\DocumentController@show')->name('doc.show')
		->middleware('permission:doc.show');
	Route::delete('doc/{document}', 'Document\DocumentController@destroy')->name('doc.destroy')
		->middleware('permission:doc.destroy');
	Route::get('doc/{document}/edit', 'Document\DocumentController@edit')->name('doc.edit')
		->middleware('permission:doc.edit');
	//Users
	Route::get('users', 'User\UserController@index')->name('users.index')
		->middleware('permission:users.index');
	//Mis aumentos 
	Route::get('users/create', 'User\UserController@create')->name('users.create')
		->middleware('permission:users.create');
	Route::post('users', 'User\UserController@store')->name('users.store')
		->middleware('permission:users.create');
	//Fin aumentos aumentos
	Route::get('users/{user}/edit', 'User\UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');
	Route::put('users/{user}', 'User\UserController@update')->name('users.update')
		->middleware('permission:users.edit');
	Route::get('users/{user}', 'User\UserController@show')->name('users.show')
		->middleware('permission:users.show');
	Route::delete('users/{user}', 'User\UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');
	// role_añadir
	Route::get('adds/{user}/edit', 'AddRoleController@edit')->name('adds.edit')
		->middleware('permission:adds.edit');
	Route::put('adds/{user}', 'AddRoleController@update')->name('adds.update')
		->middleware('permission:adds.update');
});
Route::get('charges', 'ChargeController@index')->name('charges.index');
Route::get('charges/create', 'ChargeController@create')->name('charges.create');
Route::post('charges', 'ChargeController@store')->name('charges.store');
Route::get('charges/{charge}', 'ChargeController@show')->name('charges.show');
Route::get('charges/{charge}/edit', 'ChargeController@edit')->name('charges.edit');
Route::put('charges/{charge}', 'ChargeController@update')->name('charges.update');
Route::delete('charges/{charge}', 'ChargeController@destroy')->name('charges.destroy');
Route::get('levels', 'LevelController@index')->name('levels.index');
Route::get('levels/create', 'LevelController@create')->name('levels.create');
Route::post('levels', 'LevelController@store')->name('levels.store');
Route::get('levels/{level}', 'LevelController@show')->name('levels.show');
Route::get('levels/{level}/edit', 'LevelController@edit')->name('levels.edit');
Route::put('levels/{level}', 'LevelController@update')->name('levels.update');
Route::delete('levels/{level}', 'LevelController@destroy')->name('levels.destroy');
Route::get('clases', 'ClaseController@index')->name('clases.index');
Route::get('clases/create', 'ClaseController@create')->name('clases.create');
Route::post('clases', 'ClaseController@store')->name('clases.store');
Route::get('clases/{clase}', 'ClaseController@show')->name('clases.show');
Route::get('clases/{clase}/edit', 'ClaseController@edit')->name('clases.edit');
Route::put('clases/{clase}', 'ClaseController@update')->name('clases.update');
Route::delete('clases/{clase}', 'ClaseController@destroy')->name('clases.destroy');
Route::get('salcats', 'SalcatController@index')->name('salcats.index');
Route::get('salcats/create', 'SalcatController@create')->name('salcats.create');
Route::post('salcats', 'SalcatController@store')->name('salcats.store');
Route::get('salcats/{salcat}', 'SalcatController@show')->name('salcats.show');
Route::get('salcats/{salcat}/edit', 'SalcatController@edit')->name('salcats.edit');
Route::put('salcats/{salcat}', 'SalcatController@update')->name('salcats.update');
Route::delete('salcats/{salcat}', 'SalcatController@destroy')->name('salcats.destroy');
// Crud Important Document 
Route::get('importants', 'Document\DocumentController@index_important')->name('important.index');
Route::get('importants/create', 'Document\DocumentController@create_important')->name('important.create');
Route::post('importants', 'Document\DocumentController@store_important')->name('important.store');
Route::get('importants/{document}', 'Document\DocumentController@show_important')->name('important.show');
Route::get('importants/{document}/edit', 'Document\DocumentController@edit_important')->name('important.edit');
Route::put('importants/{document}', 'Document\DocumentController@update_important')->name('important.update');
Route::delete('importants/{document}', 'Document\DocumentController@destroy_important')->name('important.destroy');
//Links Operation Documents
Route::get('clasifications', 'Document\DocumentController@clasification')->name('clasification');
Route::get('search_advanced', 'Document\DocumentController@search_advanced')->name('search_advanced');
Route::get('document_important', 'Document\DocumentController@document_important')->name('document_important');
Route::get('current_document', 'Document\DocumentController@current_document')->name('current_document');
Route::get('noncurrent_document', 'Document\DocumentController@noncurrent_document')->name('noncurrent_document');
//Operation Documents
Route::get('clasifications/leymunicipal', 'Document\DocumentController@clasifications_leymunicipal')->name('clasifications_leymunicipal');
Route::get('clasifications/resomunicipal', 'Document\DocumentController@clasifications_resomunicipal')->name('clasifications_resomunicipal');
Route::get('clasifications/resomuniadmi', 'Document\DocumentController@clasifications_resomuniadmi')->name('clasifications_resomuniadmi');
Route::get('clasifications/deedi', 'Document\DocumentController@clasifications_deedi')->name('clasifications_deedi');
Route::get('clasifications/infotrans', 'Document\DocumentController@clasifications_infotrans')->name('clasifications_infotrans');
Route::get('clasifications/infoaud', 'Document\DocumentController@clasifications_infoaud')->name('clasifications_infoaud');
Route::get('clasifications/infoges', 'Document\DocumentController@clasifications_infoges')->name('clasifications_infoges');
//estado Publish
Route::get('publish/{document}', 'Document\DocumentController@publish')->name('publish');
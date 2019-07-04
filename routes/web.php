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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('restricthome', 'taskerprofile');
Route::get('/user/commitment', 'CommitmentController@commitment')->middleware('restrict', 'taskerprofile');
Route::get('/user/eligibility', 'UserProfileController@create')->middleware('restrict', 'taskerprofile');
Route::post('/user', 'UserProfileController@store')->middleware('restrict');
//Route::get('abc', 'AbcController@abc');
Route::get('/user/categories', 'CategoriesController@categories')->middleware('restrict', 'taskerprofile');
Route::post('/tasker', 'UserSkillsController@store')->middleware('restrict');
Route::get('/user/payment_method', 'UserCCInfoController@create')->middleware('restrict');
Route::post('/payment', 'UserCCInfoController@store')->middleware('restrict');
Route::get('/tasker/profile', 'HomeController@profile')->middleware('restrict', 'validatetasker');
Route::get('/tasker/{id}/edit', 'UserProfileController@edit')->middleware('restrict', 'validatetasker');
Route::post('/tasker/{id}', 'UserProfileController@update')->middleware('restrict', 'validatetasker');
Route::get('/tasker/myjobs', 'HomeController@mjobs')->middleware('restrict');
Route::get('/tasker/confirmedjobs', 'HomeController@confirmedJobs')->middleware('restrict');
Route::get('/tasker/completedjobs', 'HomeController@cjobs')->middleware('restrict');

Route::get('/client/biodata', 'BiodataController@index')->middleware('restricttasker', 'restrictclient');
Route::post('/abcd', 'BiodataController@store')->middleware('restricttasker');

Route::get('/client/booktask', 'ClientTaskController@index')->middleware('restricttasker');
Route::get('/client/profile', 'ClientProfileController@index')->middleware('validateclient', 'restricttasker');

Route::get('/client/taskdetail', 'TaskDetailController@index')->middleware('restricttasker');
Route::post('/client', 'TaskDetailController@store')->middleware('restricttasker');
Route::get('/client/{id}/edit', 'BiodataController@edit')->middleware('restricttasker');
Route::post('/client/{id}', 'BiodataController@update');

Route::get('verify/{email}/{token}', 'Auth\RegisterController@verifyUser')->name('verify');

/*Route::post('/send', 'MailController@send');
Route::get('/email', 'MailController@email');*/
Route::get('/client/uploadedTasks', 'ClientProfileController@uploadedTasks')->middleware('validateclient'/*, 'restricttasker'*/);
Route::get('/client/signedTasks', 'ClientProfileController@signedTasks')->middleware('validateclient', 'restricttasker');
Route::get('/client/{id}/{ud}/applicatedTask', 'ClientProfileController@applicatedTask')->middleware('validateclient'/*, 'restricttasker'*/);
//Route::get('/xyz/{id}', 'ClientProfileController@update')->middleware('restrictjob');
Route::get('/xyz/{id}', 'TasksController@store')->middleware('restrictjob');
Route::get('/xyz/{id}/delete', 'TasksController@destroy')->middleware('restrictjob');
Route::get('/{id}/task', 'SeparateTaskController@task');
Route::get('/{id}/searchedJobsResults', 'TasksController@searchedJobs');
Route::get('/searched', 'TasksController@Searched');
Route::get('/decreq/{id}/{ud}', 'RequestHandlerController@declineRequest');
Route::get('/accpur/{id}/{ud}', 'RequestHandlerController@acceptPurposal');
Route::get('/tasker/{id}/confirmedTask', 'ClientProfileController@acceptedTask');
Route::get('/services', 'ServicesController@services');
Route::get('/client/{id}/jkl', 'ClientProfileController@saveCompletedTask')->middleware('validateclient', 'restricttasker');
Route::get('/client/completedTask', 'ClientProfileController@completedTask')->middleware('validateclient', 'restricttasker');
Route::get('/client/{id}/notifications', 'ClientProfileController@notifications');
Route::get('/tasker/{id}/notifications', 'HomeController@notifications');
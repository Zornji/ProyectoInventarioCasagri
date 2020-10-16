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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function(){
		//Todas las rutas del Admin
		Route::match(['get','post'],'/','AdminController@login');

		//Route::match(['get','post'],'/registe','AdminController@register');
		Route::group(['middleware'=>['admin']], function(){

			Route::get('dashboard','AdminController@dashboard');
			Route::get('settings','AdminController@settings');
			Route::get('logout','AdminController@logout');
			Route::post('check-current-pwd','AdminController@chkCurrentPassword');
			Route::post('update-current-pwd','AdminController@updateCurrentPassword');
			Route::match(['get','post'], 'update-admin-details','AdminController@updateAdminDetails');
			//sections
			Route::get('sections','SectionController@sections');
			Route::post('update-section-status','SectionController@updateSectionStatus');

			//Categorias
			Route::get('categories','categoryController@categories');
			Route::post('update-category-status','categoryController@updateCategoryStatus');
			Route::match(['get','post'],'add-edit-category/{id?}','categoryController@addEditCategory');
			Route::post('append-categories-level','categoryController@appendCategoryLevel');

			//sucursales
			Route::get('CasagriLaras','InventarioController@casagrilaras');
			Route::match(['get','post'],'add-edit-casagriL/{id?}','InventarioController@addEditCasagriL');
			Route::get('Casagribarinas','InventarioController@Casagribarinas');
			Route::get('Casagriquibor','InventarioController@Casagriquibor');

			//componentes
			Route::get('Monitor','InventarioController@Monitor');
			Route::match(['get','post'],'add-edit-monitor/{id?}','InventarioController@addEditMonitor');
			Route::post('update-monitor-status','InventarioController@updateMonitorStatus');
		});
});


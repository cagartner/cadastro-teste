<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'PeoplesController@index');

Route::resource('peoples', 'PeoplesController', array('names' => array(
	'index'     => 'peoples.index',
	'create'    => 'peoples.create',
	'show'      => 'peoples.show',
	'edit'      => 'peoples.edit',
	'store'     => 'peoples.store',
	'update'    => 'peoples.update',
	'destroy'   => 'peoples.destroy'
)));

Route::get('relatorio', array('as' => 'relatorio', 'uses' => 'PeoplesController@relatorio'));
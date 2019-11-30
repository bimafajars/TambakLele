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
//Front End
Route::get('/', 'DashboardController@index');
Route::get('/about', 'FrontendController@about')->name('landingpage.about');
//Back End
Auth::routes();
//admininstrator
Route::get('/home', 'DashboardController@index')->name('home.read')->middleware('auth');
//monitoring data tabel node 1
Route::get('monitoring/datatabel/air', 'DashboardController@tabelAir')->name('monitoring.tabel.air');
Route::get('monitoring/datatabel/airr', 'DashboardController@tabelAirr')->name('monitoring.tabel.airr');
Route::get('monitoring/datatabel/suhu', 'DashboardController@tabelSuhu')->name('monitoring.tabel.suhu');
Route::get('monitoring/datatabel/ph', 'DashboardController@tabelPh')->name('monitoring.tabel.ph');
Route::get('monitoring/datatabel/jsonph', 'DashboardController@jsonPh')->name('monitoring.tabel.jsonph');
Route::get('monitoring/datatabel/jsonsuhu', 'DashboardController@jsonsuhu')->name('monitoring.tabel.jsonsuhu');

//monitoring data tabel node 2
Route::get('monitoring/datatabelnode2/air', 'DashboardController@tabelAirnode2')->name('monitoring.tabel.air.node2');
Route::get('monitoring/datatabelnode2/suhu', 'DashboardController@tabelSuhunode2')->name('monitoring.tabel.suhu.node2');
Route::get('monitoring/datatabelnode2/ph', 'DashboardController@tabelPhnode2')->name('monitoring.tabel.ph.node2');
Route::get('monitoring/datatabelnode2/jsonph', 'DashboardController@jsonPhnode2')->name('monitoring.tabel.jsonph.node2');
Route::get('monitoring/datatabelnode2/jsonsuhu', 'DashboardController@jsonsuhunode2')->name('monitoring.tabel.jsonsuhu.node2');
//monitoring grafik
Route::get('monitoring/grafik/air', 'DashboardController@grafikAir')->name('monitoring.grafik.air');
Route::get('monitoring/grafik/suhu', 'DashboardController@grafikSuhu')->name('monitoring.grafik.suhu');
Route::get('monitoring/grafik/ph', 'DashboardController@grafikPh')->name('monitoring.grafik.ph');
// control aktuator
Route::post('update-control', 'DashboardController@Control')->name('update-status');
Route::post('update-mqtt','DashboardController@SendMsgViaMqtt')->name('update-mqtt');
// gallery
Route::get('/gallery', 'DashboardController@ReadImages')->name('images.read');
Route::get('/gallery/add', 'DashboardController@ReadAddImages')->name('images.add');
Route::post('/gallery/add/post', 'DashboardController@PostImages')->name('images.post');
Route::get('/gallery/edit/{id}', 'DashboardController@ReadEditImages')->name('images.edit');
Route::post('/gallery/edit/post', 'DashboardController@PostEditImages')->name('images.edit.post');
Route::post('/gallery/delete/', 'DashboardController@DeleteImages')->name('images.delete');
//user
Route::get('/user', 'DashboardController@ReadUser')->name('user.read');
Route::post('/user/post', 'DashboardController@PostUser')->name('user.post');
Route::post('/user/edit', 'DashboardController@EditUser')->name('user.edit');
Route::post('/user/delete', 'DashboardController@DeleteUser')->name('user.delete');
//maintenance
Route::get('/maintenance', 'DashboardController@Maintenance')->name('hapus-db');
Route::post('/maintenance/delete-db', 'DashboardController@DeleteDB')->name('hapus-data');
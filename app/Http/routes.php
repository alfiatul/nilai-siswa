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
//dasboard
Route::get('/', function () {
    return view('pages.index');
});
Route::get('/test', function () {
    return view('pages.coba');
});
Route::get('/siswa', function () {
    return view('pages.siswa');
});
Route::get('/kelas', function () {
    return view('pages.kelas');
});
Route::get('/guru', function () {
    return view('pages.guru');
});
Route::get('/mapel', function () {
    return view('pages.mapel');
});
Route::get('/jurusan', function () {
    return view('pages.jurusan');
});
Route::get('/nilai', function () {
    return view('pages.nilai');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('guru', 'GuruController');
    //
    Route::get('list-guru', 'GuruController@getList');
    Route::get('list-jurusan', 'JurusanController@getList');
    Route::get('list-kelas', 'KelasController@getList');
    Route::get('list-siswa', 'SiswaController@getList');
    Route::get('list-siswa-by-kelas/{kelas}', 'SiswaController@getListBykelas');
    //
    Route::resource('siswa', 'SiswaController');
    Route::resource('nilai', 'NilaiController');
    Route::resource('kelas', 'KelasController');
    Route::resource('mengajar', 'MengajarController');
    Route::resource('mapel', 'MapelController');
    // get list mapel
    Route::get('list-mapel', 'MapelController@getList');
    Route::resource('jurusan', 'JurusanController');
});

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/cek',function(){
// 	if(Auth::viaremember()){
// 		return 'yes';
// 	}
// 	else {
// 		return 'no';
// 	}
// });


Auth::routes();
Route::group(['middleware'=> ['auth']],function(){
	//ALL ROLE AKSES
	Route::get('/','dashboardController@index')->name('dashboard.index');
	Route::get('/home','dashboardController@index')->name('dashboard.index');
	Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');


	

	//SISTEM PENDUKUNG KEPUTUSAN
	//ONLY WALI KELAS AKSES
	Route::group(['middleware'=>['auth','role:wali_kelas',]], function(){

		Route::prefix('input-nilai')->group(function(){
			Route::get('/','InputNilaiController@index')->name('inputNilai.index');
			Route::post('/simpan-nilai','InputNilaiController@update')->name('inputNilai.simpan');
		});
		
	});
	//ONLY ADMIN AKSES
	Route::group(['middleware'=>['auth','role:admin',]], function(){
		//PENGGUNA
		Route::prefix('pengguna')->group(function(){
			Route::get('/','PenggunaController@index')->name('pengguna.index');
			Route::post('/simpan-pengguna','PenggunaController@save')->name('simpan.pengguna');
			Route::post('/update-pengguna','PenggunaController@update')->name('update.pengguna');
			Route::get('/delete-pengguna','PenggunaController@delete')->name('hapus.pengguna');
		});

		Route::prefix('kelas')->group(function(){
			Route::get('/','KelasController@index')->name('kelas.index');
			Route::post('/simpan-kelas','KelasController@save')->name('simpan.kelas');
			Route::post('/update-kelas','KelasController@update')->name('update.kelas');
			Route::get('/delete-kelas','KelasController@delete')->name('hapus.kelas');
		});
		
		// OLAH DATA AHP
		Route::prefix('ahp-kriteria')->group(function(){
			Route::get('/','AhpKriteriaController@index')->name('AhpKriteria.index');
			Route::post('/update-kriteria','AhpKriteriaController@update')->name('AhpKriteria.update');
		});
		Route::prefix('ahp-perhitungan')->group(function(){
			Route::get('/','AhpMatriksController@index')->name('AhpMatriks.index');
			Route::post('/simpan-nilai-kriteria','AhpMatriksController@update')->name('AhpMatriks.simpan');
			
		});
		Route::get('bobot-kriteria','AhpBobotController@index')->name('AhpBobot.index');

		Route::prefix('topsis-perhitungan')->group(function(){
			Route::get('/','TopsisDataNilaiController@index')->name('dataNilai.index');
			// Route::get('/cari-kelas','TopsisDataNilaiController@loadData')->name('dataNilai.loadData');

			Route::post('/simpan-nilai-alternatif','TopsisDataNilaiController@update')->name('topsisMatriks.simpan');
			Route::get('/download-data-nilai','TopsisDataNilaiController@download')->name('dataNilai.download');
			Route::post('/upload-data-nilai','TopsisDataNilaiController@upload')->name('dataNilai.upload');
		});
	});

	Route::prefix('data-siswa')->group(function(){
		Route::get('/','TopsisDataAlternatifController@index')->name('dataAlternatif.index');
		Route::post('/simpan-alternatif','TopsisDataAlternatifController@save')->name('simpanAlternatif');
		Route::post('/edit-alternatif','TopsisDataAlternatifController@update')->name('editAlternatif');
		Route::get('/hapus-alternatif','TopsisDataAlternatifController@delete')->name('hapusAlternatif');
	});

	//OLAH DATA TOPSIS
	
	Route::prefix('hasil-akhir')->group(function(){
		Route::get('/','TopsisRangkingController@index')->name('topsis.rangking');
		Route::get('/export','TopsisRangkingController@export')->name('export.alternatif');
		Route::post('/simpan-keputusan','TopsisRangkingController@keputusan')->name('keputusan.simpan');
	});
	
});

//Profil
Route::get('/profil-saya', 'ProfilSayaController@index')->name('profil.saya');
// Route::get('/profil-sekolah','ProfilSekolahController@index');










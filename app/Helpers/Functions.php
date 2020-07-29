<?php

use App\Spk_Kriteria_Nilai;
use App\Spk_Siswa_Nilai;
use App\Spk_Alternatif_Nilai_Batas_Keputusan;

function ambil_nilai_kriteria($dari,$tujuan){
	$nilai = Spk_Kriteria_Nilai::all();
	foreach($nilai as $nilais){
		if($nilais->kriteria_id_dari==$dari && $nilais->kriteria_id_tujuan==$tujuan){
			$hasil = $nilais->nilai;
		}
	}
	return $hasil;
}

function ambil_nilai_siswa($idSiswa,$idKriteria){
	$nilai = Spk_Siswa_Nilai::all();
	foreach($nilai as $nilais){
		if($nilais->id_siswa_dari==$idSiswa && $nilais->id_kriteria_tujuan==$idKriteria){
			$nilaiSiswa = $nilais->nilai;
		}
	}
	return $nilaiSiswa;
}

function set_active($uri, $output='active'){
	if(is_array($uri)){
		foreach ($uri as $u) {
			if(Route::is($u)){
				return $output;
			}
		}
	}
	else{
		if(Route::is($uri)){
			return $output;
		}
	}

}

// function limit_words($string, $word_limit){
// 	$words = explode(" ",$string);
// 	return implode(" ",array_splice($words,0,$word_limit));
// }
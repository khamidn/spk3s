<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spk_Kriteria;
use App\Spk_Siswa;
use App\Spk_Kelas;
use App\Spk_Siswa_Nilai;
use Excel;
use Auth;

class InputNilaiController extends Controller
{
     public function index(){
    	$kriteria = Spk_Kriteria::all();
        $idUser= Auth::User()->id;//id user wali
        $kelas = Spk_Kelas::where('users_id',$idUser)->first();//id kelas wali
    	$siswa = Spk_Siswa::where('kelas_id',$kelas->id)->get();//tampilkan siswa kelas wali
    	
    	$data = array();
    	foreach($kriteria as $data_kriteria){
    		$data[$data_kriteria->id_kriteria]= $data_kriteria->nama_kriteria;
    	}
    	$bobotss = Spk_Kriteria::pluck("bobot_kriteria");
    	$dataAlternatif = Spk_Siswa::pluck("id");
        $rangking=Spk_Siswa::orderBy('nilai_akhir_ci','desc')->get();
    	
    	return view('spk.inputNilai.inputNilai',['kriteria'=>$kriteria, 'siswa'=>$siswa, 'data'=>$data, 'bobotss'=>$bobotss, 'dataAlternatif'=>$dataAlternatif,'rangking'=>$rangking]);
    }

    public function update(Request $request){
        $idUser = Auth::User()->id;
        $kelas= Spk_Kelas::where('users_id',$idUser)->first();
    	$nSiswa=Spk_Siswa_Nilai::where('id_kelas',$kelas->id)->get();
    	foreach($nSiswa as $nS){
    		$id=$nS->id;
    		$dari=$nS->id_siswa_dari;
    		$tujuan=$nS->id_kriteria_tujuan;
    		$kolom="kolom-".$dari."-".$tujuan;
    		Spk_Siswa_Nilai::where("id",$id)->update(["nilai"=>$request->$kolom]);
    	}

    	$inputRangking = Spk_Siswa::where('kelas_id',$kelas->id)->get();
    	$nourut=0;
    	foreach($inputRangking as $iR ){
    		$nourut+=1;
    		$id2=$iR->id;
            $kolom3="nilaiCi-k".$nourut;
    		
            Spk_Siswa::where("id",$id2)->update(["nilai_akhir_ci"=>$request->$kolom3]);
    	}
        
    	return redirect()->back()->with('status-sukses','Nilai Siswa dan hasil keputusan berhasil disimpan');
    }
}

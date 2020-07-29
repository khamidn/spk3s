<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Spk_Kriteria;
use App\Spk_Kriteria_Nilai;

class AhpMatriksController extends Controller
{
    public function index(){
    	$kriteria = Spk_Kriteria::all();
    	$kriteria_nilai = Spk_Kriteria::all();
    	$data=array();
    	foreach($kriteria as $data_kriteria){
    		$data[$data_kriteria->id_kriteria] = $data_kriteria->nama_kriteria;
    	}
    	return view('spk.ahp.AhpMatriks',['kriteria'=>$kriteria, 'data'=>$data]);
    }

    public function update(Request $request){
        if($request->sumcr<0.1){
                //update nilai kritera di table spk_kriteria_nilai
            $nilai = Spk_Kriteria_Nilai::all();
            foreach($nilai as $nilais){
                $id=$nilais->id_kriteria_nilai;
                $dari=$nilais->kriteria_id_dari;
                $tujuan=$nilais->kriteria_id_tujuan;
                $kolom="kolom-".$dari."-".$tujuan;
                Spk_Kriteria_Nilai::where("id_kriteria_nilai",$id)->update(["nilai"=>$request->$kolom]);
            }

            //update bobot_kriteria di tabel spk_kriteria
            $kriteria = Spk_Kriteria::all();
            $no=0;
            foreach($kriteria as $kBobot){
                $idKriteria=$kBobot->id_kriteria;
                $no+=1;
                $bobot ="hasilrk-b".$no;
                Spk_Kriteria::where("id_kriteria",$idKriteria)->update(["bobot_kriteria"=>$request->$bobot]);
            }
            return redirect()->back()->with('status-sukses','Nilai Kriteria berhasil disimpan');
        }

        else{
            return redirect()->back()->with('status-danger','Maaf, nilai kriteria tidak bisa disimpan. Karena nilai CR > 0.1. Silakan lakukan input nilai kriteria kembali');
        }
    }

}


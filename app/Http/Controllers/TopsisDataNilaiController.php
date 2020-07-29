<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spk_Kriteria;
use App\Spk_Siswa;
use App\Spk_Kelas;
use App\Spk_Siswa_Nilai;
use Excel;

class TopsisDataNilaiController extends Controller
{
    public function index(Request $request){
    	$kriteria = Spk_Kriteria::all();
        $filterKelas = $request->get('cariKelas');
        if($filterKelas){
            $Siswa = Spk_Siswa::where('kelas_id',$filterKelas)->get();
        }
        else{
            $Siswa = Spk_Siswa::where('kelas_id',0)->get();    
        }
        
        $kelas = Spk_Kelas::all();
        
    	$data = array();
    	foreach($kriteria as $data_kriteria){
    		$data[$data_kriteria->id_kriteria]= $data_kriteria->nama_kriteria;
    	}
    	$bobotss = Spk_Kriteria::pluck("bobot_kriteria");
    	$dataAlternatif = Spk_Siswa::pluck("id");
        $rangking=Spk_Siswa::orderBy('nilai_akhir_ci','desc')->get();
    	
    	return view('spk.topsis.TopsisDataNilai',['kriteria'=>$kriteria, 'siswa'=>$Siswa, 'kelas'=>$kelas, 'data'=>$data, 'bobotss'=>$bobotss, 'dataAlternatif'=>$dataAlternatif,'rangking'=>$rangking]);
    }

    public function update(Request $request){
        
        //$nSiswa=Spk_Siswa_Nilai::where('id_kelas',$kelas->id)->get();
        $kelas = $request->inputKelas;

        if(!empty($kelas)){
           
            $nSiswa=Spk_Siswa_Nilai::where('id_kelas',$kelas)->get();
            foreach($nSiswa as $nS){
                $id=$nS->id;
                $dari=$nS->id_siswa_dari;
                $tujuan=$nS->id_kriteria_tujuan;
                $kolom="kolom-".$dari."-".$tujuan;
                Spk_Siswa_Nilai::where("id",$id)->update(["nilai"=>$request->$kolom]);
            }
            // $inputRangking = Spk_Siswa::where('kelas_id',$kelas->id)->get();
            $inputRangking = Spk_Siswa::where('kelas_id',$kelas)->get();
            $nourut=0;
            foreach($inputRangking as $iR ){
                $nourut+=1;
                $id2=$iR->id;
                $kolom3="nilaiCi-k".$nourut;
                
                Spk_Siswa::where("id",$id2)->update(["nilai_akhir_ci"=>$request->$kolom3]);
            }
        }
    	
        
    	return redirect()->back()->with('status-sukses','Nilai Siswa dan hasil keputusan berhasil disimpan');
    }

    public function download(){
        $nilaiSiswa = Spk_Siswa_Nilai::all();
        // dd($nilaiSiswa);
        $siswa = Spk_Siswa::all();
        $kriteria = Spk_Kriteria::all();
        $data = array();
        foreach($kriteria as $data_kriteria){
            $data[$data_kriteria->id_kriteria]= $data_kriteria->nama_kriteria;
        }

        return Excel::create('Data Nilai Siswa', function($excel) use($siswa, $data){
            return $excel->sheet('Data Nilai Siswa', function($sheet) use($siswa, $data){
                $datasheet = array();
                $datasheet[0] = array('nisn', 'semester_ganjil', 'semester_genap', 'kehadiran', 'praktek', 'tugas', 'sikap');

                $i=1;
                $jumlah = count($data);
                foreach ($siswa as $al) {
                    $datasheet[$i]= array($al['nisn']);
                    for($a=1; $a<=$jumlah; $a++){
                        $keys =array_keys($data);
                        $xxx=$keys[array_search("gsda",$keys)+($a-1)];
                        $nilai = ambil_nilai_siswa($al->id,$xxx);
                        $datasheet[$i][$a]=$nilai;
                    }
                    $i++;
                }
            $sheet->fromArray($datasheet);
            });
        })->export('xls');

    }

    public function upload(Request $request){

             if($request->hasFile('import_nilai')){
                Excel::load($request->file('import_nilai')->getRealPath(), function ($reader) {

                    $kriteria = Spk_Kriteria::all();
                    $Siswa = Spk_Siswa::all();
                    $idNilai=Spk_Siswa_Nilai::all();

                    $data = array();
                    foreach($kriteria as $data_kriteria){
                        $data[$data_kriteria->id_kriteria]= $data_kriteria->nama_kriteria;
                    }


                    $c=1;
                    $jumlah = count($data);
                    $nilai = $reader->toArray();
                    $i=1;
                    //  foreach ($idNilai as $iN){// untuk jumlah alternatif
                    //     $id=$iN->id_alternatif_nilai;
                    //     // Spk_Alternatif_Nilai::where("id_alternatif_nilai",$id)->update(["nilai"=>$ns]);
                    // }

                    for($i=1; $i<=5; $i++){
                        for($b=1; $b<=$jumlah; $b++){ // jumlah kriteria
                            $ns = $nilai[$i][$b];
                            Spk_Alternatif_Nilai::where("id",$c++)->update(["nilai"=>$ns]);       
                        }
                    }
                });
            }
            return redirect()->back();
        }

        // public function loadData(Request $request){
            
        //     $cariKelas = $request->get('cariKelas');
        //     dd($cariKelas);
        //     // if($cariKelas){
        //     //     $cari = $request->cariKelas;
        //     //     $data = Spk_Siswa::where('kelas_id',$cariKelas)->get();
        //     //     dd($data);
        //     // }
        // }
}

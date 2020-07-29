<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Spk_Siswa;
use App\Spk_Kelas;
use Excel;
use Auth;

class TopsisRangkingController extends Controller
{
    
    public function index(Request $request){
        if(Auth::check()){
            $kelas = Spk_Kelas::all();
            if(Auth::user()->hasRole('wali_kelas')){
                
                $idUser= Auth::User()->id;//id user wali
                $kelas = Spk_Kelas::where('users_id',$idUser)->first();//id kelas wali
                $rangking = Spk_Siswa::where('kelas_id',$kelas->id)->orderBy('nilai_akhir_ci','desc')->get();//tampilkan siswa kelas wali
                return view('spk.topsis.TopsisRangking',['rangking'=>$rangking,'kelas'=>$kelas]);
            }
            else{
                $cariKelas = $request->get('cariKelas');
                if($cariKelas){
                    $rangking=Spk_Siswa::where('kelas_id',$cariKelas)->orderBy('nilai_akhir_ci','desc')->get();
                }
                else{
                    $rangking=Spk_Siswa::where('kelas_id',$cariKelas)->orderBy('nilai_akhir_ci','desc')->get();
                }
                
                return view('spk.topsis.TopsisRangking',['rangking'=>$rangking, 'kelas'=>$kelas]);
            }
        }
    }

    public function export(Request $request){
        if(Auth::check()){
            if(Auth::user()->hasRole('wali_kelas')){
                $idUser= Auth::User()->id;//id user wali
                $kelas = Spk_Kelas::where('users_id',$idUser)->first();//id kelas wali
                $items = Spk_Siswa::where('kelas_id',$kelas->id)->orderBy('nilai_akhir_ci','desc')->get();//tampilkan siswa kelas wali
                return Excel::create('rangking', function($excel) use($items){
                    return $excel->sheet('Sheet 1',function($sheet) use($items){
                        $datasheet = array();
                        // $datasheet[0] = array('No','Kode Alternatif','Nama Alternatif','kelas','Nilai Akhir');
                        $datasheet[0] = array('No','Nama Siswa','Nilai');
                        $i=1;
                        foreach($items as $datanew){
                            $datasheet[$i]= array(
                                $datanew[0]=$i,
                                $datanew['nama_siswa'],
                                $datanew['nilai_akhir_ci'],
                            );
                            $i++;
                        }
                        $sheet->fromArray($datasheet);
                    });
                })->export('xls');
            }
            else{
                 $kelas = $request->inputKelas;
                 dd($kelas);
                 if(!empty($kelas)){
                    $items = Spk_Siswa::where('kelas_id',$kelas)->orderBy('nilai_akhir_ci','desc')->get();//tampilkan data perkelas
                    return Excel::create('rangking', function($excel) use($items){
                        return $excel->sheet('Sheet 1',function($sheet) use($items){
                            $datasheet = array();
                            $datasheet[0] = array('No','Nama Siswa','Nilai');
                            $i=1;
                            foreach($items as $datanew){
                                $datasheet[$i]= array(
                                    $datanew[0]=$i,
                                    $datanew['nama_siswa'],
                                    $datanew['nilai_akhir_ci'],
                                );
                                $i++;
                            }
                            $sheet->fromArray($datasheet);
                        });
                    })->export('xls');

                 }

            }

        }
        
    }

    public function keputusan(Request $request){
        $idUser = Auth::User()->id;
        $kelas = Spk_Kelas::where('users_id',$idUser)->first();
        $inputKeputusan = Spk_Siswa::where('kelas_id',$kelas->id)->orderBy('nilai_akhir_ci','desc')->get();
        $nourut3=0;
        foreach($inputKeputusan as $iK){
            $nourut3+=1;
            $id3=$iK->id;
            $kolom3="keputusan-k".$nourut3;
            Spk_Siswa::where("id",$id3)->update(["keputusan"=>$request->$kolom3]);
        }
        return redirect()->back()->with('status-suksess','Keputusan kenaikan kelas berhasil disimpan');
    }
}

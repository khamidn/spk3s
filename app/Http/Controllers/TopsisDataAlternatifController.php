<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Spk_Siswa;
use App\Spk_Kriteria;
use App\Spk_Siswa_Nilai;
use App\Spk_Kelas;
use Response;
use Validator;
use Auth;



class TopsisDataAlternatifController extends Controller
{
    public function index(Request $request){
    	// $alternatif=Spk_Siswa::orderby('id','desc')->with('spk_kelas')->get();
         $kelas=Spk_Kelas::all();
        if(Auth::check()){
            if(Auth::user()->hasRole('admin')){
                $filterKelas = $request->get('cariKelas');
                if($filterKelas){
                    $Siswa = Spk_Siswa::where('kelas_id',$filterKelas)->orderby('id','desc')->with('spk_kelas')->get();
                }
                else{
                    $Siswa = Spk_Siswa::where('kelas_id',0)->orderby('id','desc')->with('spk_kelas')->get();    
                }
                return view('spk.topsis.TopsisDataAlternatif',['siswa'=>$Siswa,'kelas'=>$kelas]);
            }

            else{
                $idUser= Auth::User()->id;//id user wali
                $IdKelas = Spk_Kelas::where('users_id',$idUser)->first();//id kelas wali
                $Siswa = Spk_Siswa::where('kelas_id',$IdKelas->id)->get();
                return view('spk.topsis.TopsisDataAlternatif',['siswa'=>$Siswa,'kelas'=>$kelas, 'IdKelas'=>$IdKelas]);
            }
        }


    	
    }

    public function save(Request $request){
        $rules = array(
            'nisn'=>'required|unique:spk_siswa',
            'nama'=>'required',
            'kelas'=>'required',
        );


        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }
        else{
            // $cariId=Spk_Alternatif::max('id');
            $siswa = new Spk_Siswa;
            $siswa->nisn =$request->nisn;
            $siswa->nama_siswa = $request->nama;
            $siswa->kelas_id = $request->kelas;
            $siswa->keputusan = 0;
            $siswa->save();

            $idKriteria = Spk_Kriteria::all();
            foreach ($idKriteria as $idK) {
                $id=$idK->id_kriteria;
                $tambahNilai = new Spk_Siswa_Nilai;
                $tambahNilai->id_kelas=$siswa->kelas_id;
                $tambahNilai->id_siswa_dari=$siswa->id;
                $tambahNilai->id_kriteria_tujuan=$id;
                $tambahNilai->nilai=0;
                $tambahNilai->save();
            }
            
        }
        return response()->json();
            
    }

    public function update(Request $request){
        $siswa = Spk_Siswa::find($request->id);
        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa=$request->nama;
        $siswa->kelas_id=$request->kelas;
        $siswa->save();

        $updateKelas = Spk_Siswa_Nilai::where('id_siswa_dari',$request->id)->get();
        foreach($updateKelas as $uK){
            Spk_siswa_Nilai::where('id_siswa_dari',$request->id)->update(["id_kelas"=>$request->kelas]);
        }
        return response()->json();
    }

    public function delete(Request $request){
        $siswa =Spk_Siswa::find($request->id)->delete();
        return response()->json();
    }


}

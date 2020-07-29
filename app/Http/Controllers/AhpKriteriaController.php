<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spk_Kriteria;
use Response;
use Validator;

class AhpKriteriaController extends Controller
{
    public function index(){

    	$kriteria=Spk_Kriteria::all();
    	return view('spk.ahp.AhpKriteria',['kriteria'=>$kriteria]);
    }

    public function update(Request $request){
    	Spk_Kriteria::where("id_kriteria",$request->id)->update(["nama_kriteria"=>$request->nama]);
    	return response()->json();
    }
}

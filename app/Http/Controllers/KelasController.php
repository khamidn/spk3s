<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;

use App\Spk_Kelas;
use App\User;

class KelasController extends Controller
{
    public function index(){

    	$kelas =Spk_Kelas::with('users')->get();
    	$users = User::with('roles')->get();
    	return view('spk.kelas.kelas',['kelas'=>$kelas, 'users'=>$users]);

    }

    public function save(Request $request){
    	$rules = array(
    		'nama_kelas'=>'required|unique:spk_kelas'
    	);

    	$validator = Validator::make(Input::all(), $rules);
    	if($validator->fails()){
    		return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    	}

    	else{
	    	if($request->waliKelas == ''){
	    		$tambahKelas = new Spk_Kelas;
	    		$tambahKelas->nama_kelas = $request->nama_kelas;
	    		$tambahKelas->users_id = 1;
	    		$tambahKelas->save();
	    	}
	    	else{
	    		$tambahKelas = new Spk_Kelas;
	    		$tambahKelas->nama_kelas = $request->nama_kelas;
	    		$tambahKelas->users_id = $request->waliKelas;
	    		$tambahKelas->save();
	    	}
    	}

    	return response()->json();
    }


    public function update(Request $request){
    	$updateKelas = Spk_Kelas::find($request->id);
    	$updateKelas->nama_kelas= $request->nama_kelas;
    	$updateKelas->users_id = $request->users_id;
        $updateKelas->save();
    	return response()->json();
    }

    public function delete(Request $request){
    	$deleteKelas = Spk_Kelas::find($request->id);
    	$deleteKelas->delete();
    	return response()->json();
    }
}

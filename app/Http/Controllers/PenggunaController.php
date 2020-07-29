<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use Response;
use Validator;

class PenggunaController extends Controller
{
    public function index(){
    	$users=User::orderby('id','desc')->with('roles')->get();
        // dd($users);
    	return view('spk.pengguna.pengguna',['users'=>$users]);
    }

    public function save(Request $request){
       $rules = array(
            'username'=>'required|unique:users|regex:/^\S*$/u',
            'password'=>'required|min:6',
            'roles'=>'required',
        );

        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }
        
        else{
            $pengguna = new User;
            $pengguna->username= $request->username;
            $pengguna->password = bcrypt($request->password);
            $pengguna->password_unscript = $request->password;
            $pengguna->save();
            // $pengguna->attachRole($request->roles);
            if($request->roles=='admin'){
                $pengguna->attachRole(1);    
            }
            else{
                $pengguna->attachRole(2);    
            }
            return response()->json();
        }
    }

    public function update(Request $request){
    	$pengguna = User::find($request->id);
    	$pengguna->username= $request->username;
    	$pengguna->password = bcrypt($request->password);
    	$pengguna->password_unscript = $request->password;
        if($request->roles=='admin'){
            $pengguna->roles()->sync(1);    
        }
        else{
            $pengguna->roles()->sync(2);    
        }
    	
        $pengguna->save();
    	return response()->json();
    }

    public function delete(Request $request){
        $pengguna =User::find($request->id);
        $pengguna->roles()->detach($request->id);
        $pengguna->delete();
        return response()->json();
    }
}

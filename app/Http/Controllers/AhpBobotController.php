<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spk_Kriteria;

class AhpBobotController extends Controller
{
    public function index(){
    	$bobotKriteria = Spk_Kriteria::all();
    	return view('spk.ahp.AhpBobot',['bobotKriteria'=>$bobotKriteria]);

    }
}

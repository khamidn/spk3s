<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spk_Siswa;
use App\Spk_Kelas;
use App\User;

class dashboardController extends Controller
{
  public function index()
  {
      
      $jumlahTNK=Spk_Siswa::where('keputusan','0')->count();
      $jumlahNK=Spk_Siswa::where('keputusan','1')->count();
      $jumlahS=Spk_Siswa::all()->count();
      $jumlahK=Spk_Kelas::all()->count();
      $jumlahP=User::all()->count();
      return view('dashboard.index',['jumlahTNK'=>$jumlahTNK,'jumlahNK'=>$jumlahNK,'jumlahS'=>$jumlahS,'jumlahK'=>$jumlahK, 'jumlahP'=>$jumlahP]);
  }

  public function create()
  {
    //
  }
  public function store(Request $request)
  {
      //
  }

   public function save(Request $masuk)
   {
   }

  public function show($id)
  {
      //
  }
  public function edit($id)
  {
      //
  }


  public function update(Request $request, $id)
  {
      //
  }
  public function destroy($id)
  {
      //
  }
}

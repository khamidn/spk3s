<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilSayaController extends Controller
{
  public function index()
  {
      return view('profil.profilSaya');
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

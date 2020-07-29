<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spk_Siswa extends Model
{
    //
    protected $table = "spk_siswa";

    public function spk_kelas(){
    	return $this->belongsTo(Spk_Kelas::class,'kelas_id');
    }
}

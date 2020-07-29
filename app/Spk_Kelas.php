<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spk_Kelas extends Model
{
    protected  $table="spk_kelas";

    public function spk_siswa(){
    	return $this->hasOne(Spk_Siswa::class);
    }

    public function users(){
    	return $this->belongsTo(User::class,'users_id');
    }

    
}

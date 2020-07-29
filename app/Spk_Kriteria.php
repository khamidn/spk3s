<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spk_Kriteria extends Model
{
    protected $table="spk_kriteria";

    // public function spk_alternatif(){
    // 	return $this->belongsToMany(Spk_Alternatif::class,'spk_alternatif_nilai','id_alternatif_dari','id');
    // }
}

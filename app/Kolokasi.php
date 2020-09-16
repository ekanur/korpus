<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kolokasi extends Model
{
    protected $table = "kolokasi";
    protected $fillable = ['korpus_id', 'kolokasi', 'frekuensi_kata', 'frekuensi_kata_persen', 'frekuensi_dokumen', 'frekuensi_dokumen_persen'];

    public function korpus()
    {
        return $this->belongsTo("App\Korpus");
    }

    public function analisaKolokasi()
    {
        return $this->hasMany("App\AnalisaKolokasi");
    }

}

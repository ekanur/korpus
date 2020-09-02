<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisaKolokasi extends Model
{
    protected $table = "analisa_kolokasi";
    protected $dates = ['analyze_on'];
    protected $fillable = ['literatur_id', "kolokasi_id", "jumlah"];

    public function kolokasi()
    {
        return $this->belongsTo("App\Kolokasi");
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Literatur extends Model
{
    protected $table = "literatur";
    protected $fillable = ["json_konten"];
    // protected $casts = [
    //     'json_konten' => 'array',
    // ];

    public function korpus()
    {
        return $this->belongsTo("App\Korpus");
    }

    public function kategori(){
        return $this->belongsTo("App\Kategori");
    }

    public function uploadedBy(){
        return $this->belongsTo("App\User", "uploaded_by");
    }

    public function analisaLiteratur()
    {
        return $this->hasOne("App\AnalisaLiteratur");
    }

    public function analisaKolokasi()
    {
        return $this->hasMany("App\AnalisaKolokasi");
    }
}

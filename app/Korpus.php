<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korpus extends Model
{
    protected $table = "korpus";

    // protected $fillable = ['name'];

    public function literatur()
    {
        return $this->hasMany("App\Literatur");
    }

    public function user(){
        return $this->belongsTo("App\User");
    }

    public function kataDasar()
    {
        return $this->hasMany("App\KataDasar");
    }

    public function kolokasi()
    {
        return $this->hasMany("App\Kolokasi");
    }

    public function token()
    {
        return $this->hasMany("App\Token");
    }

    public function pencarian(){
        return $this->hasMany("App\Pencarian");
    }

    public function kategori(){
        return $this->hasMany("App\Kategori");
    }
}

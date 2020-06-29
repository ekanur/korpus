<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = "token";
    protected $fillable = ['korpus_id', 'token', 'frekuensi_kata', 'frekuensi_kata_persen', 'frekuensi_dokumen', 'frekuensi_dokumen_persen'];

    public function korpus()
    {
        return $this->belongsTo("App\Korpus");
    }
}

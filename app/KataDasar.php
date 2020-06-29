<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KataDasar extends Model
{
    protected $table = "kata_dasar";
    protected $fillable = ['korpus_id', 'kata_dasar', 'frekuensi_kata', 'frekuensi_kata_persen', 'frekuensi_dokumen', 'frekuensi_dokumen_persen'];

    public function korpus()
    {
        return $this->belongsTo("App\Korpus");
    }
}

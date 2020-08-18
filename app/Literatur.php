<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Literatur extends Model
{
    protected $table = "literatur";
    protected $dates = ['created_at', 'updated_at','analyze_on'];

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
}

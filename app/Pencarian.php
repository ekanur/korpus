<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencarian extends Model
{
    protected $table = "pencarian";
    protected $fillable = ['korpus_id', 'keyword', 'total'];

    public function korpus()
    {
        return $this->belongsTo("App\Korpus");
    }
}

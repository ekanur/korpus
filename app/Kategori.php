<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";

    protected $fillable = ['korpus_id', 'kategori', 'parent_id'];

    public function korpus()
    {
        return $this->belongsTo("App\Korpus");
    }

    public function kategori()
    {
        return $this->hasMany("App\Kategori", "parent_id");
    }

    public function subKategori()
    {
        return $this->hasMany("App\Kategori", "parent_id")->with('kategori');;
    }

    public function parentKategori(){
        return $this->hasOne("App\Kategori", "parent_id")->with('kategori');;
    }

    public function literatur()
    {
        return $this->hasMany("App\Literatur");
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', 0);
    }
}

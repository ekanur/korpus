<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisaLiteratur extends Model
{
    protected $table = "analisa_literatur";
    protected $dates = ['analyze_on'];
    protected $fillable = ['literatur_id', "jumlah_kata", "jumlah_kata_dasar", "jumlah_token", "analyze_on"];

}

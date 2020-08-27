<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnalisaLiteratur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_literatur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("literatur_id")->constrained("literatur");
            $table->integer("jumlah_kata");
            $table->integer("jumlah_kata_dasar")->nullable();
            $table->integer("jumlah_token")->nullable();
            $table->timestamp("analyze_on");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

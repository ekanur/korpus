<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Korpus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korpus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('urutan')->unique();
            $table->string("jenis");
            $table->integer("jumlah_literatur");
            $table->integer("jumlah_kata");
            $table->integer("kata_dasar");
            $table->integer("token");
            $table->foreignId("user_id")->constrained();
            $table->timestamps(0);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kolokasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolokasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('korpus_id')->constrained("korpus");
            $table->string("kolokasi");
            $table->decimal("frekuensi_kata")->nullable();
            $table->decimal("frekuensi_kata_persen")->nullable();
            $table->decimal("frekuensi_dokumen")->nullable();
            $table->decimal("frekuensi_dokumen_persen")->nullable();
            $table->timestamps();
            $table->softDeletes();
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

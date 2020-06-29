<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KataDasar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kata_dasar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('korpus_id')->constrained("korpus");
            $table->string("kata_dasar");
            $table->decimal("frekuensi_kata")->nullable();
            $table->decimal("frekuensi_kata_persen")->nullable();
            $table->decimal("frekuensi_dokumen")->nullable();
            $table->decimal("frekuensi_dokumen_persen")->nullable();
            $table->timestamps(0);
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

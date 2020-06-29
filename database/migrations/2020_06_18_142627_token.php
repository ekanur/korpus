<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Token extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('korpus_id')->constrained("korpus");
            $table->string("token");
            $table->decimal("frekuensi_token")->nullable();
            $table->decimal("frekuensi_token_persen")->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Literatur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('literatur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("korpus_id")->constrained("korpus");
            $table->foreignId("kategori_id")->constrained("kategori");
            $table->string("path");
            $table->string("judul");
            $table->string("tahun_terbit");
            $table->json("konten")->nullable();
            $table->integer("uploaded_by");
            $table->timestamp("analyze_on")->nullable();
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

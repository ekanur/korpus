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
            $table->json("konten")->nullable();
            $table->integer("uploaded_by");
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApuntesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apunte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tema');
            $table->text('texto');
            $table->string('titulo');
            $table->string('url_imagen');
            $table->string('url_recurso');
            $table->string('url_archivo');
            $table->foreign('id_tema')->references('id')->on('tema')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('apunte');
    }
}

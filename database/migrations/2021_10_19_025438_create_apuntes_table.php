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
            $table->unsignedBigInteger('id_usuario');
            $table->string('titulo');
            $table->text('texto')->nullable();
            $table->string('url_imagen')->nullable();
            $table->string('url_recurso')->nullable();
            $table->string('url_archivo')->nullable();
            $table->foreign('id_tema')->references('id')->on('tema')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
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

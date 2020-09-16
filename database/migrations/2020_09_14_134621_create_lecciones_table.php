<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecciones', function (Blueprint $table) {
            $table->id();
            $table->string('title_leccion', 128)->unique();
            $table->string('slug', 128)->unique();
            $table->string('description_leccion')->nullable();
            $table->time('duracion_curso')->nullable();
            $table->mediumText('url_video');

            // Relaciones
            $table->foreign('id')->references('leccion_id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('lecciones');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoLeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_leccion', function (Blueprint $table) {
            $table->id();
            $table->integer('curso_id')->unsigned();
            $table->integer('leccion_id')->unsigned();

            // Relaciones
            $table->foreign('curso_id')
                    ->references('id')
                    ->on('cursos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('leccion_id')
                    ->references('id')
                    ->on('lecciones')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

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
        Schema::dropIfExists('curso_leccion');
    }
}

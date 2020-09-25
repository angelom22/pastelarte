<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarreraCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_curso', function (Blueprint $table) {
            $table->id();

            $table->integer('carrera_id')->unsigned();
            $table->integer('curso_id')->unsigned();

            // Relaciones
            $table->foreign('carrera_id')
                    ->references('id')
                    ->on('carreras')
                    // ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('curso_id')
                    ->references('id')
                    ->on('cursos')
                    // ->onDelete('set null')
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
        Schema::dropIfExists('carrera_curso');
    }
}

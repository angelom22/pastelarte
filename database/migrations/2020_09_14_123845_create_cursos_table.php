<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('carrera_id')->unsigned()->nullable();
            // $table->foreignId('leccion_id')->references('id')->on('lecciones')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('title', 128)->unique();
            $table->string('slug', 128)->unique();
            $table->string('thumbnail');
            $table->mediumText('extracto');
            $table->mediumText('description')->nullable();
            $table->decimal('precio', 9, 2)->unsigned();
            $table->time('duracion_curso')->nullable();
            $table->string('nivel_habilidad', 128)->nullable();
            $table->string('lengueaje', 128)->nullable();
            $table->string('instructor', 128)->nullable();
            $table->mediumInteger('valoracion')->nullable();
            $table->mediumText('url_video_preview_curso');

            $table->enum('status', ['DISPONIBLE', 'INHABILITADO'])->default('DISPONIBLE');

            $table->timestamps();

            // Relaciones
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}

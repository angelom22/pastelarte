<?php

use App\Models\Leccion;
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
            $table->integer('curso_id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title_leccion', 128);
            $table->string('slug', 128);
            $table->tinyInteger('order');
            $table->enum('leccion_type', [Leccion::ZIP, Leccion::VIDEO])->default(Leccion::VIDEO);
            $table->string('description_leccion')->nullable();
            // $table->time('duration_leccion')->nullable();
            $table->unsignedTinyInteger('duracion_leccion')->nullable()->comment('Total minutos');
            $table->text('url_video')->nullable();
            $table->string('file')->nullable();

            // Relaciones
            $table->foreign('id')->references('leccion_id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('set null')->onUpdate('cascade');

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

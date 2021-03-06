<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title', 128);
            $table->string('slug', 128)->unique();
            $table->mediumText('extracto');
            $table->text('content');
            $table->timestamp('fecha')->nullable();
            $table->timestamp('hora')->nullable();
            $table->string('direccion', 128)->nullable();
            $table->string('file', 128)->nullable();
            $table->mediumText('iframe')->nullable();
            $table->timestamps();

            // Relaciones
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

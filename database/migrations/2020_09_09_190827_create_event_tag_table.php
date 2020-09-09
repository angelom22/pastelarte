<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tag', function (Blueprint $table) {
            $table->id();

            $table->integer('event_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->timestamps();

            // Relaciones
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_tag');
    }
}

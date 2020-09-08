<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->string('title', 128);
            $table->string('slug', 128)->unique();

            $table->mediumText('extracto')->nullable();
            $table->text('content');
            $table->enum('status', ['PUBLICADO', 'BORRADOR'])->default('BORRADOR');
            $table->string('file', 128)->nullable();
            $table->mediumText('iframe')->nullable();

            // $table->timestamp('published_at')->nullable();

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
        Schema::dropIfExists('blogs');
    }
}

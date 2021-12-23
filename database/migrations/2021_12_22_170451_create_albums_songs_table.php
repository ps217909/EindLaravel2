<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums_songs', function (Blueprint $table) {
            $table->integer('albums_id')->unsigned();
            $table->integer('songs_id')->unsigned();
            $table->foreign('albums_id')
            ->references('id')
            ->on('albums')
            ->onDelete('cascade');
            $table-> foreign('songs_id')
            ->references('id')
            ->on('songs')
            ->onDelete('cascade');
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
        Schema::dropIfExists('albums_songs');
    }
}

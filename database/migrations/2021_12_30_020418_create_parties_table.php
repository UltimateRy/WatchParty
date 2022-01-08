<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('host_id')->unsigned();
            $table->bigInteger('movie_id')->unsigned();
            $table->boolean('invite_only');
            $table->timestamps();

            $table->foreign('host_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('movie_id')->references('id')->on('movies')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties');
    }
}

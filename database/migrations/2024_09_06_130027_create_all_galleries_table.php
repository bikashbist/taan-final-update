<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('album_id')->nullable();
            $table->string('title');
            $table->text('image');
            $table->string('type')->nullable();
            $table->string('extension')->nullable();
            $table->string('size')->nullable();
            $table->foreign('album_id')
                ->references('id')->on('galleries')
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
        Schema::dropIfExists('all_galleries');
    }
}

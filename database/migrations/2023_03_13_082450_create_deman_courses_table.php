<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemanCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deman_courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('duration')->nullable();
            $table->string('start_date')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default('0');
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
        Schema::dropIfExists('deman_courses');
    }
}

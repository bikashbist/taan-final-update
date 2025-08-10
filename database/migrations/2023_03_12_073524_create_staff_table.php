<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->text('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('image')->nullable();
            $table->string('social_profile_fb')->nullable();
            $table->string('social_profile_twitter')->nullable();
            $table->string('social_profile_insta')->nullable();
            $table->string('social_profile_wikipedia')->nullable();
            $table->string('from_to_date')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('featured')->nullable();
            $table->foreign('branch_id')
                ->references('id')->on('branches')
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
        Schema::dropIfExists('staff');
    }
}

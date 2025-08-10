<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_unique_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug', 100)->unique()->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default('1');
            $table->string('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('tag')->nullable();
            $table->string('author')->nullable();
            $table->string('order')->nullable()->default(1);
            $table->string('video_url');
            $table->string('video_id')->nullable();
            $table->unsignedInteger('visit_no')->default(0);
            $table->timestamps();
        });
        Schema::table('posts', function ($table) {
            $table->foreign('category_id')
                ->references('id')->on('post_categories')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

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
            $table->string('post_unique_id')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('slug', 100)->unique()->nullable();
            $table->string('trail_address')->nullable();
            $table->string('duration')->nullable();
            $table->string('activities')->nullable();
            $table->string('max_altitude')->nullable();
            $table->string('group_size')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('season_id')->nullable();
            $table->string('difficult_id')->nullable();
            $table->string('month_id')->nullable();
            $table->string('experience_id')->nullable();
            $table->string('culture_id')->nullable();
            $table->string('destination_id')->nullable();
            $table->string('transport_id')->nullable();
            $table->boolean('status')->default('1');
            $table->boolean('featured')->default('0');
            $table->longText('description')->nullable();
            $table->longText('photo_video_description')->nullable();
            $table->longText('more_info')->nullable();
            $table->json('days')->nullable(); // Field for FAQs
            $table->json('faq')->nullable(); // Field for FAQs
            $table->json('videos')->nullable(); // Field for videos
            $table->string('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('blog_thumnail')->nullable();
            $table->string('route_map')->nullable();


            $table->string('tag')->nullable();
            $table->string('author')->nullable();
            $table->string('url')->nullable();
            $table->string('order')->nullable()->default(1);
            $table->unsignedInteger('visit_no')->default(0);
            // $table->text('more_details')->nullable(); // Field for more details
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('blogs', function ($table) {
            $table->foreign('category_id')
                ->references('id')->on('blog_categories')
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
        Schema::dropIfExists('blogs');
    }
}

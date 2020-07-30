<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug_vi')->enique();
            $table->string('slug_en')->enique();
            $table->integer('cate_post_id')->unsigned()->nullable();
            $table->integer('position')->unique()->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_home')->default(0);
            $table->string('image')->nullable();
            $table->text('title_vi')->nullable();
            $table->text('title_en')->nullable();
            $table->longText('description_vi')->nullable();
            $table->longText('description_en')->nullable();
            $table->text('title_seo_vi')->nullable();
            $table->text('title_seo_en')->nullable();
            $table->text('meta_key_vi')->nullable();
            $table->text('meta_key_en')->nullable();
            $table->text('meta_des_vi')->nullable();
            $table->text('meta_des_en')->nullable();
            $table->timestamps();
            $table->foreign('cate_post_id')->references('id')->on('cate_posts')->onDelete('cascade');
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

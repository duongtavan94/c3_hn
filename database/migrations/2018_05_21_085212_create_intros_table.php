<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vi');
            $table->string('name_en');
            $table->string('slug_vi')->enique();
            $table->string('slug_en')->enique();
            $table->integer('position')->unique()->nullable();
            $table->boolean('status')->default(0);
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intros');
    }
}

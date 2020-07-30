<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->integer('cate_product_id')->unsigned()->nullable();
            $table->string('slug_vi')->enique();
            $table->string('slug_en')->enique();
            $table->integer('price')->nullable();
            $table->integer('position')->unique()->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_home')->default(0);
            $table->string('image')->nullable();
            $table->text('title_vi')->nullable();
            $table->text('title_en')->nullable();
            $table->longText('description_vi')->nullable();
            $table->longText('description_en')->nullable();
            $table->integer('discount')->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->boolean('available')->default(1)->nullable();
            $table->text('title_seo_vi')->nullable();
            $table->text('title_seo_en')->nullable();
            $table->text('meta_key_vi')->nullable();
            $table->text('meta_key_en')->nullable();
            $table->text('meta_des_vi')->nullable();
            $table->text('meta_des_en')->nullable();
            $table->timestamps();
            $table->foreign('cate_product_id')->references('id')->on('cate_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

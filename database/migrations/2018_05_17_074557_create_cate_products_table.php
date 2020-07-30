<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug_vi');
            $table->string('slug_en');
            $table->string('image')->nullable();
            $table->integer('position')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('cate_products');
    }
}

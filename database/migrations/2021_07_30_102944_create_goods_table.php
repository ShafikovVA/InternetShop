<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('second_name')->nullable();
            $table->string('slug')->nullable();
            $table->double('price');
            $table->text('description');
            $table->integer('quantity');
            $table->string('img');
            $table->boolean('is_popular')->default(0);
            $table->bigInteger('subcategory_id')->unsigned()->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->bigInteger('subcategory2_id')->unsigned()->nullable();
            $table->foreign('subcategory2_id')->references('id')->on('subcategories2lvl');
            $table->bigInteger('sales_id')->unsigned()->nullable();
            $table->foreign('sales_id')->references('id')->on('sales');
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::dropIfExists('goods');
    }
}

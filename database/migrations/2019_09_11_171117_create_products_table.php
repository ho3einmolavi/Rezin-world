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
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->float('price')->nullable();
            $table->float('final_price')->nullable();
            $table->bigInteger('number')->default(0)->nullable();
            $table->bigInteger('sale')->default(0);
            $table->text('brand_id')->nullable();
            $table->string('available')->nullable();
            $table->string('discount')->default(1)->nullable();
            $table->boolean('slideShow')->default(0)->nullable();
            $table->bigInteger('main_category_id')->nullable();
            $table->bigInteger('secondary_category_id')->nullable();
            $table->text('description')->nullable();
            $table->text('product_img')->nullable();
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
        Schema::dropIfExists('products');
    }
}

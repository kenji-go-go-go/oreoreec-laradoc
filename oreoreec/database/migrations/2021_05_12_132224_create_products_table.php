<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            //以下修正
            $table->softDeletes('deleted_at');
            $table->text('name')->comment('商品名');
            $table->string('image_path')->comment('商品画像');
            $table->string('unit_price')->comment('商品単価');
            $table->integer('stock_number')->comment('在庫数');
            $table->text('description')->comment('商品説明');
            $table->integer('box_number')->comment('箱数');
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

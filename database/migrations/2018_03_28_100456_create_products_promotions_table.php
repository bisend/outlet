<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('promotion_id')->unsigned();
            $table->boolean('is_visible')->default(true);
            $table->integer('priority')->default(1000);
            $table->string('code_1c', 36)->nullable();
            $table->timestamps();

            $table->unique(['product_id', 'promotion_id'], 'unique_product_id_promotion_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_promotions');
    }
}

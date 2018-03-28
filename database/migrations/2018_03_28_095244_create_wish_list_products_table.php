<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishListProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_list_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wish_list_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->string('code_1c', 36)->nullable();
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
        Schema::dropIfExists('wish_list_products');
    }
}

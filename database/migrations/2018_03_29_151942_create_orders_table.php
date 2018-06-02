<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->integer('delivery_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('total_products_count')->unsigned();
            $table->decimal('total_order_amount', 8, 2);
            $table->string('email');
            $table->string('name');
            $table->string('phone_number');
            $table->integer('order_number')->nullable();
            $table->string('checkout_point')->nullable();
            $table->string('np_delivery_type')->nullable();
            $table->string('np_city')->nullable();
            $table->string('np_city_ref')->nullable();
            $table->string('np_warehouse')->nullable();
            $table->string('np_warehouse_ref')->nullable();
            $table->string('a_street')->nullable();
            $table->string('a_land')->nullable();
            $table->string('a_city')->nullable();
            $table->string('post_index')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

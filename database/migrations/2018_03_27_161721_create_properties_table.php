<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('property_name_id')->unsigned();
            $table->integer('property_value_id')->unsigned();
            $table->boolean('is_visible')->default(true);
            $table->integer('priority')->default(1000);
            $table->string('code_1c', 36)->nullable();
            $table->timestamps();

            $table->unique(['product_id', 'property_name_id', 'property_value_id'], 'unique_product_id_property_name_id_property_value_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
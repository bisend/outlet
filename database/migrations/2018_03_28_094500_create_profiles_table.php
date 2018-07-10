<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            // ---------------------------------------------------------------------------------------------------------

            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->integer('payment_id')->unsigned()->nullable();
            $table->integer('delivery_id')->unsigned()->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address_delivery')->nullable();
            $table->string('code_1c', 255)->nullable();
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
        Schema::dropIfExists('profiles');
    }
}

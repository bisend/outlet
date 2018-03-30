<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_slider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->unique();
            $table->string('url_ru')->nullable();
            $table->string('url_uk')->nullable();
            $table->string('big_text_ru')->nullable();
            $table->string('big_text_uk')->nullable();
            $table->string('small_text_ru')->nullable();
            $table->string('small_text_uk')->nullable();
            $table->string('btn_text_ru')->nullable();
            $table->string('btn_text_uk')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->integer('priority')->default(1000);
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
        Schema::dropIfExists('main_slider');
    }
}

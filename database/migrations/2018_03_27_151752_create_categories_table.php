<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('meta_tag_id')->nullable()->unsigned();
            $table->string('name_ru')->unique();
            $table->string('name_uk')->unique();
            $table->string('slug')->unique();
            $table->boolean('is_visible')->default(true);
            $table->integer('priority')->default(1000);
            $table->string('image')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_uk')->nullable();
            $table->string('code_1c', 36)->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

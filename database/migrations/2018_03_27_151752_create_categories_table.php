<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            // ---------------------------------------------------------------------------------------------------------

            $table->increments('id');
            $table->integer('parent_id')->nullable()->unsigned();
//            $table->integer('meta_tag_id')->nullable()->unsigned();
            $table->string('name_ru');
            $table->string('name_uk');
            $table->string('slug')->unique();
            $table->boolean('is_visible')->default(true);
            $table->integer('priority')->default(1000);
            $table->string('image')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_uk')->nullable();
            $table->string('code_1c', 255)->nullable();
            //meta
            $table->string('meta_title_ru')->nullable();
            $table->string('meta_title_uk')->nullable();
            $table->string('meta_description_ru')->nullable();
            $table->string('meta_description_uk')->nullable();
            $table->string('meta_keywords_ru')->nullable();
            $table->string('meta_keywords_uk')->nullable();
            $table->string('meta_h1_ru')->nullable();
            $table->string('meta_h1_uk')->nullable();
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

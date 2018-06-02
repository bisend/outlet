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
            $table->increments('id');
            $table->integer('category_id')->unsigned();
//            $table->integer('meta_tag_id')->nullable()->unsigned();
            $table->integer('breadcrumb_category_id')->nullable()->unsigned();
            $table->string('name_ru')->unique();
            $table->string('name_uk')->unique();
            $table->string('slug')->unique();
            $table->boolean('is_visible')->default(true);
            $table->boolean('in_stock')->default(true);
            $table->decimal('price', 8, 2);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_uk')->nullable();
            $table->integer('priority')->default(1000);
            $table->string('vendor_code')->nullable()->unique();
            $table->decimal('rating', 8, 2)->nullable();
            $table->integer('number_of_views')->unsigned()->default(0);
            $table->string('code_1c', 36)->nullable();
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

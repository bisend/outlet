<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_names', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            // ---------------------------------------------------------------------------------------------------------

            $table->increments('id');
            $table->string('name_ru')->unique();
            $table->string('name_uk')->unique();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('property_names');
    }
}

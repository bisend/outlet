<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            // ---------------------------------------------------------------------------------------------------------

            $table->increments('id');
            $table->string('original')->nullable()->unique();
            $table->string('big')->nullable()->unique();
            $table->string('medium')->nullable()->unique();
            $table->string('small')->nullable()->unique();
            $table->boolean('is_visible')->default(true);
            $table->integer('priority')->default(1000);
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
        Schema::dropIfExists('images');
    }
}

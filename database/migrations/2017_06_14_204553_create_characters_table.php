<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name', 191);
            $table->string('realm', 191);
            $table->integer('region_id')->nullable();
            $table->integer('class_character')->nullable();
            $table->integer('race')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('faction')->nullable();
            $table->integer('level')->nullable();
            $table->integer('achievementPoints')->nullable();
            $table->integer('averageItemLevelEquipped')->nullable();
            $table->string('thumbnail', 191)->nullable();
            $table->string('main', 191)->nullable();
            $table->nullableTimestamps();





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}

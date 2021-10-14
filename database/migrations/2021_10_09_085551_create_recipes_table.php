<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_recipe', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('ingredients');
            $table->text('preparation');
            $table->string('img');
            $table->foreignId('user_id')->references('id')->on('users')->comment("Recipe User");
            $table->foreignId('category_id')->references('id')->on('category_recipe')->comment("Recipe User");
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
        Schema::dropIfExists('category_recipe');
        Schema::dropIfExists('recipes');
    }
}

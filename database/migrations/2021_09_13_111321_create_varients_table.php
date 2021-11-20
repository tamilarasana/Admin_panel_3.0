<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVarientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('bikemodel_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('description')->nullable();        
            $table->timestamps();      
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('bikemodel_id')->references('id')->on('bikemodels')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('varients');
    }
}

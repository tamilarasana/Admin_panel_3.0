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
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('bikemodel_id')->unsigned();
            $table->bigInteger('varient_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('about_bike')->nullable();
            $table->integer('price')->nullable();
            $table->string('route')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('bikemodel_id')->references('id')->on('bikemodels')->onDelete('cascade');
            $table->foreign('varient_id')->references('id')->on('varients')->onDelete('cascade');
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

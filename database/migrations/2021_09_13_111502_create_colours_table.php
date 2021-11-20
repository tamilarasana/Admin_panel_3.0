<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bikemodel_id')->unsigned();
            $table->bigInteger('varient_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->string('colour_name')->nullable();
            $table->string('colour_code')->nullable();
            $table->timestamps();
            $table->foreign('bikemodel_id')->references('id')->on('bikemodels')->onDelete('cascade');
            $table->foreign('varient_id')->references('id')->on('varients')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colours');
    }
}

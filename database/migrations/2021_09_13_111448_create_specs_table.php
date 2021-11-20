<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('specname_id')->unsigned();
            $table->bigInteger('varient_id')->unsigned();
            $table->string('specname')->nullable();
            $table->string('value')->nullable();
            $table->integer('status')->nullable();
            $table->foreign('specname_id')->references('id')->on('specnames')->onDelete('cascade');
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
        Schema::dropIfExists('specs');
    }
}

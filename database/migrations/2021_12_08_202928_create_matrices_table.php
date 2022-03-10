<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pillar_id');
            $table->foreign('pillar_id')->references('id')->on('pillars');
            $table->string('country_symbol');
            $table->string('country');
            $table->longText('key_action');
            $table->longText('status');
            $table->enum('priority', ['low', 'high', 'medium'])->default('low');
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
        Schema::dropIfExists('matrices');
    }
}

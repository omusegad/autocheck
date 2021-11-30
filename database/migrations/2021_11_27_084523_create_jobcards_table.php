<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobcards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('companyName');
            $table->unsignedBigInteger('wsmast_jobno');
            $table->string('regno');
            $table->string('customer');
            $table->string('account')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('done17')->nullable();
            $table->string('chasisno')->nullable();
            $table->string('model')->nullable();
            $table->date('jobdate')->nullable();
            $table->date('tr_date')->nullable();
            $table->string('reference')->nullable();
            $table->string('gate_no')->nullable();
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
        Schema::dropIfExists('jobcards');
    }
}

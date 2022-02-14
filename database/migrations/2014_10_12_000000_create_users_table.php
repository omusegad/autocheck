<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('role', ['admin', 'superAdmin'])->nullable()->default('admin');
            $table->string('email')->unique();
            $table->string('phoneNumber')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('country_symbol');
            $table->string('country');

            // $table->date('date_signed_the_dcoc')->nullable();
            // $table->date('date_signed_the_ja')->nullable();
            // $table->longText('stateDesignation')->nullable();
            // $table->longText('national_focal_point')->nullable();
            // $table->longText('job_title')->nullable();
            // $table->longText('nfp_contact_details')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

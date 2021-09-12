<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('ic');
            $table->date('dob');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('race');
            $table->string('religion');
            $table->string('nationality');
            $table->string('email');
            $table->string('phone_num');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zipcode');
            $table->string('country');
            $table->string('position_applied');
            $table->double('expected_salary',8,2);
            $table->string('document');
            $table->string('image');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');
            $table->string('relation_emergency');
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
        Schema::dropIfExists('online_applicants');
    }
}

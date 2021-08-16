<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_infos', function (Blueprint $table) {
            $table->id();
            $table->string('employee_Vaccination_ID');
            $table->string('employee_ID');
            $table->integer('employee_IC')->unsigned();
            $table->string('employee_Name');
            $table->string('vaccine_Type');
            $table->text('vaccination_Location');
            $table->dateTime('vaccination_DateTime');
            $table->string('vaccination_Status');
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
        Schema::dropIfExists('vaccination_infos');
    }
}

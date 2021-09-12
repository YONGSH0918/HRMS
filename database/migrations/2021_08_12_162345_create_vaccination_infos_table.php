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
            $table->string('employee_IC');
            $table->string('employee_Name');
            $table->string('vaccine_Type');
            $table->string('health_Facility');
            $table->text('vaccination_Location');
            $table->date('vaccination_Date');
            $table->time('vaccination_Time');
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

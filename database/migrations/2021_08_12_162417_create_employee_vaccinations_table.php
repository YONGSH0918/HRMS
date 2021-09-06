<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeVaccinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_vaccinations', function (Blueprint $table) {
            $table->id();
            $table->string('employee_Vaccination_ID');
            $table->string('employee_ID');
            $table->string('employee_Name');
            $table->string('employee_Department');
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
        Schema::dropIfExists('employee_vaccinations');
    }
}

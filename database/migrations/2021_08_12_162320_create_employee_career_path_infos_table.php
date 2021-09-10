<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeCareerPathInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_career_path_infos', function (Blueprint $table) {
            $table->id();
            $table->string('employee_CareerPath_Info_ID');
            $table->string('employee_ID');
            $table->string('supervisor_Name');
            $table->string('current_JobTitle');
            $table->string('program_Title');
            $table->text('program_Desc');
            $table->date('periodPlan_From');
            $table->date('periodPlan_To');
            $table->string('tranningOrCourse_Name');
            $table->dateTime('scheduled_Date_Completed');
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
        Schema::dropIfExists('employee_career_path_infos');
    }
}

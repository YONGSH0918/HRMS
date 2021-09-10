<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_ID');
            $table->string('ic');
            $table->string('employee_Name', 60);
            $table->string('image')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('race');
            $table->string('country');
            $table->string('national');
            $table->text('address');
            $table->string('contact_Number');
            $table->string('email');
            $table->string('department');
            $table->string('jobtitle');
            $table->double('salary')->unsigned();
            $table->date('start_Date');
            $table->date('end_Date')->nullable();
            $table->string('emergency_Name');
            $table->string('emergency_Contact_Number');
            $table->string('document')->nullable();
            $table->string('status');
            $table->string('employment_ID'); // fulltime-parttime
            $table->string('marital_Status');
            $table->string('salary_structure');
            $table->string('leave_grade');
            $table->string('employee_grade');
            $table->integer('epf_number')->nullable();
            $table->string('bank_Name');
            $table->integer('bank_account_number');
            $table->string('workingSchedule');
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
        Schema::dropIfExists('employees');
    }
}

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
            $table->string('employee_ID')->nullable();
            $table->string('ic');
            $table->string('employee_Name', 60);
            $table->string('image')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('race');
            $table->string('national');
            $table->string('country');    
            $table->string('state');
            $table->string('city');
            $table->text('address');
            $table->string('contact_Number');
            $table->string('email');
            $table->string('department')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('jobtitle')->nullable();
            $table->double('salary')->unsigned()->nullable();
            $table->date('start_Date')->nullable();
            $table->date('end_Date')->nullable();
            $table->string('emergency_Name');
            $table->string('emergency_Contact_Number');
            $table->string('document')->nullable();
            $table->string('status')->nullable();
            $table->string('employment_ID')->nullable(); // fulltime-parttime
            $table->string('marital_Status');
            $table->string('salary_structure')->nullable();
            $table->string('leave_grade')->nullable();
            $table->string('employee_grade')->nullable();
            $table->integer('epf_number')->nullable();
            $table->string('bank_Name')->nullable();
            $table->integer('bank_account_number')->nullable();
            $table->string('workingSchedule')->nullable();
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

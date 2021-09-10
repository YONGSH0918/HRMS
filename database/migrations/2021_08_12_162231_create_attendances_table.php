<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('attendance_ID');
            $table->string('employee_ID');
            $table->string('employee_Name');
            $table->string('department');
            $table->Date('date');
            $table->time('time_In');
            $table->time('time_Out');
            $table->string('attendance_Status');
            $table->string('signature');
            $table->string('calendar_ID')->nullable();
            $table->double('total_Hours_Per_Day', 2, 2);
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
        Schema::dropIfExists('attendances');
    }
}

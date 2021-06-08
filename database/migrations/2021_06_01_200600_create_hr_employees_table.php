<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name',150)->nullable(false);
            $table->string('employee_code',150)->nullable(false)->unique();
            $table->date('admission_date')->nullable(true);
            $table->foreignId('sub_groups_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sub_groups_id')->references('id')->on('sub_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hr_employees');
    }
}

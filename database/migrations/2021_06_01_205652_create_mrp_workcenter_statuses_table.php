<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMrpWorkcenterStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mrp_workcenter_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('mrp_workcenter_status_name')->unique()->nullable(false);
            $table->string('mrp_workcenter_status_description')->nullable(true);

            $table->softDeletes();
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
        Schema::dropIfExists('mrp_workcenter_statuses');
    }
}

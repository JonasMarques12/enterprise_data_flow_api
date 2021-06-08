<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMrpWorkcentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mrp_workcenters', function (Blueprint $table) {
            $table->id();
            $table->string('mrp_workcenter_name', 80)->nullable(false);
            $table->date('mrp_workcenter_startered_date')->nullable(true);
            $table->decimal('mrp_workcenter_capacity_percent', 5, 2)->default(80); //percentual
            $table->decimal('mrp_workcenter_kw_h', 9, 3)->default(0.00);
            $table->decimal('mrp_workcenter_new_value', 9, 3)->default(0.00)->comment('preço da máquina nova');
            $table->decimal('annual_depreciation_rate', 5, 2)->default(10)->comment('taxa percentual anual');
            $table->decimal('mrp_workcenter_lifespan', 4, 1)->default(0)->comment('vida útil em anos');
            $table->decimal('mrp_workcenter_annual_depreciation', 9, 3)->default(0.00)->comment('depreciação calculada');
            $table->decimal('mrp_workcenter_real_price', 9, 3)->default(0.00)->comment('valor hora calculado');
            $table->decimal('mrp_workcenter_price', 9, 3)->default(0.00)->comment('valor hora inserido manualmente');
            $table->boolean('is_operating')->default(true);
            $table->boolean('in_operation')->default(false);
            $table->foreignId('mrp_workcenter_statuses_id')->nullable(true);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('mrp_workcenter_statuses_id')->references('id')->on('mrp_workcenter_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mrp_workcenters');
    }
}

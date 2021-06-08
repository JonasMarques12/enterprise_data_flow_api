<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMrpProductionOpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mrp_production_ops', function (Blueprint $table) {
            $table->id();
            $table->string('mrp_production_op_code')->nullable(false)->unique();
            $table->foreignId('products_id')->nullable(true);
            $table->foreignId('crm_sales_orders_id')->nullable(true);
            $table->foreignId('groups_id')->nullable(false);
            $table->integer('product_qtty')->nullable(false);

            $table->timestamps();

            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('crm_sales_orders_id')->references('id')->on('crm_sales_orders');
            $table->foreign('groups_id')->references('id')->on('groups');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mrp_production_ops');
    }
}

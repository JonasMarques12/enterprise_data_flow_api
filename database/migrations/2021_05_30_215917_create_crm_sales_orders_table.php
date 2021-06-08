<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_sales_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crm_client_id')->nullable(true);
            $table->foreignId('user_id')->nullable(true);
            $table->foreignId('sub_groups_id');
            $table->string('sales_order_code')->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('crm_client_id')->references('id')->on('crm_clients');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('crm_sales_orders');
        
    }
}

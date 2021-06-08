<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMrpDefaultOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mrp_default_operations', function (Blueprint $table) {
            $table->id();
            $table->string('mrp_default_operation_name',100)->nullable(false)->unique(true);
            $table->time('default_time',0)->default('00:00:00')->nullable(true);
            $table->decimal('default_price',9,3)->default('0.00')->nullable(true);
            
            $table->timestamps();
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
        Schema::dropIfExists('mrp_default_operations');
    }
}

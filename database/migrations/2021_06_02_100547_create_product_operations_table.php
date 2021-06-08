<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->nullable(true);
            $table->foreignId('mrp_default_operations_id')->nullable(true);
            $table->time('product_operation_time', 0)->nullable(true)->comment('Tempo de operação estimado');
            $table->time('product_operation_real_time', 0)->nullable(true)->default('00:00:00')->comment('Tempo de operação calculado');
            $table->integer('product_operation_sequence')->nullable(true);
            $table->integer('product_operation_sequence_real')->nullable(true)->comment('Sequência real alterada durante processo');

            $table->timestamps();

            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('mrp_default_operations_id')->references('id')->on('mrp_default_operations');
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
        Schema::dropIfExists('product_operations');
    }
}

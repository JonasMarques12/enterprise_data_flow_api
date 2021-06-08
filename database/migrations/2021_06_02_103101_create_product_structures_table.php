<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->nullable(true)->comment('Id produto pai');
            $table->foreignId('product_code')->nullable(true)->comment('código do produto filho');
            $table->decimal('product_qtty',10,4)->nullable(true)->default(0.00)->comment('Quantidade do produto filho');
            $table->string('product_structure_rev')->default('00')->comment('Número da revisão. Deve existir um valor correspondente na tabela "product_revisions"');
            
            $table->timestamps();
            $table->foreign('products_id')->references('id')->on('products');


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
        Schema::dropIfExists('product_structures');
    }
}

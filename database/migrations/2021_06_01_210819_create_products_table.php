<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code',150)->nullable(false);
            $table->string('product_image_path',270)->nullable(true);
            $table->foreignId('product_revisions_id')->nullable(true);
            $table->foreignId('sub_groups_id')->nullable(false);
            $table->string('structure_rev')->default('00')->comment('Número da revisão. Esse valor corresponde ao número da revisão na tabela "product_structure". A alteração deste é automática');
            $table->timestamps();
            
            $table->foreign('product_revisions_id')->references('id')->on('product_revisions');
            $table->foreign('sub_groups_id')->references('id')->on('sub_groups');
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
        Schema::dropIfExists('products');
    }
}

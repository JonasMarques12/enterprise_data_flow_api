<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_revisions', function (Blueprint $table) {
            $table->id();
            $table->string('product_revision_description')->nullable(true);
            $table->decimal('product_revision_sales_price',9,3)->default(0.00)->nullable(true);
            $table->decimal('product_revision_purchase_price',9,3)->default(0.00)->nullable(true);
            $table->decimal('product_revision_length',9,3)->default(0.000)->nullable(true);
            $table->decimal('product_revision_height',9,3)->default(0.000)->nullable(true);
            $table->decimal('product_revision_width',9,3)->default(0.000)->nullable(true);
            $table->decimal('product_revision_weight',9,3)->default(0.000)->nullable(true);
            $table->string('product_revision_number')->default('00');
            $table->foreignId('hr_employees_id')->nullable(true);
            $table->foreignId('fin_taxes_ipis_id')->nullable(true);
            $table->foreignId('fin_taxes_ncms_id')->nullable(true);
            $table->foreignId('uoms_id')->nullable(true);
            $table->timestamps();

            $table->foreign('hr_employees_id')->references('id')->on('hr_employees');
            $table->foreign('fin_taxes_ipis_id')->references('id')->on('fin_taxes_ipis');
            $table->foreign('fin_taxes_ncms_id')->references('id')->on('fin_taxes_ncms');
            $table->foreign('uoms_id')->references('id')->on('uoms');
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
        Schema::dropIfExists('product_revisions');
    }
}

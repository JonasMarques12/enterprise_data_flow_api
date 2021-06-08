<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinTaxesIpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_taxes_ipis', function (Blueprint $table) {
            $table->id();
            $table->string('fin_taxes_ipi_name',10)->nullable(true);
            $table->string('fin_taxes_ipi_description',250)->nullable(true);
            $table->string('fin_taxes_ipi_code',50)->nullable(true);
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
        Schema::dropIfExists('fin_taxes_ipis');
    }
}

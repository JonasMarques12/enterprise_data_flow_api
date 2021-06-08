<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmClientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_client_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crm_clients_id');
            $table->string('logradouro')->nullable(true);
            $table->string('rua')->nullable(true);
            $table->string('bairro')->nullable(true);
            $table->string('cidade')->nullable(true);
            $table->string('estado')->nullable(true);
            $table->string('pais')->nullable(true);
            $table->string('cep')->nullable(true);
            $table->integer('numero')->nullable(true);
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('crm_clients_id')->references('id')->on('crm_clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_clients_addresses');
    }
}

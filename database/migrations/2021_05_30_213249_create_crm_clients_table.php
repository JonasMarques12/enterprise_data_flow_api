<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_corporate_name',250)->nullable(true);
            $table->string('client_name',150)->nullable(false);
            $table->string('client_cnpj',30)->nullable(false);
            $table->foreignId('sub_groups_id');
            $table->timestamps();

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
        Schema::dropIfExists('crm_clients');
    }
}

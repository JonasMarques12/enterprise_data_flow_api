<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_groups', function (Blueprint $table) {
            $table->id();
            $table->string('sub_group_code')->unique()->nullable(false);
            $table->string('sub_group_name',50)->nullable(true);
            $table->string('sub_group_description',250)->nullable(true);
            $table->foreignId('groups_id')->nullable(false);
            $table->timestamps();

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
        Schema::dropIfExists('sub_groups');
    }
}

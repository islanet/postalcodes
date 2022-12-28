<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('key');
            $table->string('name');
            $table->unsignedInteger('code')->nullable();
            $table->unsignedInteger('locality_id')->nullable();
            $table->unsignedInteger('municipality_id')->nullable();
            $table->unsignedInteger('zip_code_id');
            $table->unsignedInteger('zone_type_id');
            $table->unsignedInteger('settlement_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlements');
    }
};

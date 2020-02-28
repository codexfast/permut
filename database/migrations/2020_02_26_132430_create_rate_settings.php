<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('percent');
            $table->decimal('rate_transaction', 6,2);
            $table->decimal('rate_initial', 6,2);
            $table->decimal('max', 6,2);
            $table->decimal('min', 6,2);
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
        Schema::dropIfExists('users');
    }
}

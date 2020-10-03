<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->constrained();
            $table->time('start');
            $table->time('end');
            $table->boolean('full_open');
            $table->boolean('holiday');
            $table->string('weekday');
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
        Schema::dropIfExists('opening_hours');
    }
}

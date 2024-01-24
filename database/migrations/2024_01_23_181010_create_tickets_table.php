<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flight_id')->index();
            $table->integer('ticket_number');
            $table->string('passenger_name');
            $table->string('boarding_gate');
            $table->string('class');
            $table->string('seat');
            $table->dateTime('boarding_time');
            $table->string('status');
            $table->timestamps();
            $table->foreign('flight_id')->references('id')->on('flights')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

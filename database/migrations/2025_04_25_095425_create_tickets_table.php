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
            $table->foreignId('trip_id')->constrained('trip')->onDelete('cascade'); // FK
            $table->unsignedInteger('seat_number'); // 1 to 40 etc.
            $table->string('name');
            $table->string('cnic');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // optional if you're saving customer
            $table->timestamps();
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

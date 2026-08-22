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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnUpdate();
            $table->unsignedTinyInteger('num_nights')->default(1); 
            $table->string('status')->default('unconfirmed')->comment('unconfirmed, checked_in, checked_out, cancelled');
            $table->unsignedTinyInteger('num_guests'); 
            $table->boolean('has_breakfast')->default(false);
            $table->decimal('breakfast_price',10,2);
            $table->decimal('room_price',10,2);
            $table->decimal('total_price',10,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

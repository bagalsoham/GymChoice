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
       Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('contact_phone');
            $table->string('email')->unique();
            $table->time('opening_time');
            $table->time('closing_time');
            $table->decimal('day_pass_price', 8, 2)->nullable();
            $table->decimal('platform_commission_percentage', 5, 2)->default(0.00);
            $table->string('status')->default('pending'); // e.g., pending, approved, rejected
            $table->text('rejection_reason')->nullable();
            $table->boolean('is_active')->default(false);
            $table->foreign('owner_id')->references('id')->on('gym_owners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};

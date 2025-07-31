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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_name')->unique();
            $table->string('property_slug')->unique();
            $table->string('property_address')->nullable();
            $table->string('property_image')->nullable();
            $table->string('property_city')->nullable();
            $table->longText('property_detail')->nullable();
            $table->timestamp('property_possession')->nullable();
            $table->string('property_type')->nullable();
            $table->integer('property_developer')->nullable();
            $table->string('property_amenities')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

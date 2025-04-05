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
        Schema::create('request_services', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('cif');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->date('date_start');
            $table->foreignId('crop_type_id')
            ->nullable()
            ->constrained('crop_types')
            ->nullOnDelete()
            ->onUpdate('cascade');
            $table->foreignId('service_type_id')
            ->nullable()
            ->constrained('service_types')
            ->nullOnDelete()
            ->onUpdate('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_services');
    }
};

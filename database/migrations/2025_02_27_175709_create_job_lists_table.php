<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('job_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('position_type');
            $table->string('salary')->nullable();
            $table->string('location');
            $table->text('description')->nullable();
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Ensure foreign key exists
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('job_lists');
    }
};

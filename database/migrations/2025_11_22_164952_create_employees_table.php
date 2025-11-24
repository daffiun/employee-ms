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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('birthdate')->nullable();
            $table->text('address')->nullable();
            $table->date('join_date');

            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('position_id')->cascadeOnDelete();
            $table->foreignId('manager_id')->nullable()->constrained('employees')->nullOnDelete();

            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

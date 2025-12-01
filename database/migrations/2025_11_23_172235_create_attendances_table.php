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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->date('date');

            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();

            $table->enum('status', ['hadir', 'sakit', 'izin', 'alpha'])->default('hadir');

            $table->timestamps();

            $table->unique(['employee_id', 'date']);
        });
        Schema::create('atttendance_logs', function(Blueprint $table) {
            $table->id();

            $table->foreignId('attendance_id')->constrained()->cascadeOnDelete();

            $table->integer('late_minutes')->default(0);
            $table->integer('overtime_minutes')->default(0);
            $table->integer('worked_minutes')->default(0);

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};

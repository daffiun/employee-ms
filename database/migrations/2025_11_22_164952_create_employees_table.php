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
            $table->string('phone');
            $table->date('birthdate');
            $table->text('address');
            $table->date('join_date');

            $table->enum('employment_type', ['fulltime', 'parttime', 'contract', 'intern'])
                ->default('fulltime');

            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->foreignId('position_id')->constrained()->cascadeOnDelete();

            $table->foreignId('manager_id')->nullable()->constrained('employees')->nullOnDelete();

            // rate for salary calculations
            $table->decimal('overtime_rate', 12, 2)->default(30000); // per hour
            $table->decimal('late_penalty_rate', 12, 2)->default(20000); // per hour

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

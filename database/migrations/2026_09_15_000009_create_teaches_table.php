<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('teaches', function (Blueprint $table) {
            $table->foreignId('Course_ID')->constrained(table: 'courses', column: 'Course_ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Teacher_ID')->constrained(table: 'teachers', column: 'Teacher_ID')->cascadeOnDelete()->cascadeOnUpdate();
            // Composite Primary Key
            $table->primary(['Course_ID', 'Teacher_ID']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('teaches');
    }
};
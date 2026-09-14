<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('takes', function (Blueprint $table) {
            $table->foreignId('University_ID')->constrained(table: 'students', column: 'University_ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Course_ID')->constrained(table: 'courses', column: 'Course_ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Semester', 50);
            // Composite Primary Key
            $table->primary(['University_ID', 'Course_ID', 'Semester']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('takes');
    }
};
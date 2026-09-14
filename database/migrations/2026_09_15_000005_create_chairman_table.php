<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('chairman', function (Blueprint $table) {
            $table->id('Chairman_ID');
            $table->foreignId('Department_ID')
                  ->unique()
                  ->constrained(table: 'departments', column: 'Department_ID')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('chairman');
    }
};
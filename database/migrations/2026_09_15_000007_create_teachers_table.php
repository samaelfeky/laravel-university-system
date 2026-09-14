<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('Teacher_ID');
            $table->string('name');
            $table->string('type', 100)->nullable();
            $table->foreignId('Department_ID')->nullable()->constrained(table: 'departments', column: 'Department_ID')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('teachers');
    }
};
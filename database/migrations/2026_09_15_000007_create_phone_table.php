<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('phone', function (Blueprint $table) {
            $table->foreignId('University_ID')->constrained(table: 'students', column: 'University_ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Phone_Number', 20);
            // Composite Primary Key
            $table->primary(['University_ID', 'Phone_Number']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('phone');
    }
};
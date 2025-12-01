<?php 
use Illuminate\Database\Migrations\Migration;
 use Illuminate\Database\Schema\Blueprint; 
 use Illuminate\Support\Facades\Schema; 
 
 return new class extends Migration { 
    public function up(): void { 
        Schema::create('donation', function (Blueprint $table) { 
            $table->id(); $table->integer('donation_id')->nullable(); $table->enum('donation_type', ['Money', 'food', 'cloth', 'Books', 'Equipment', 'Other'])->nullable(); $table->text('description')->nullable(); 
            $table->string('image')->nullable(); $table->timestamps(); }); 
        } 
        public function down(): void { 
            Schema::dropIfExists('donation'); } 
        };
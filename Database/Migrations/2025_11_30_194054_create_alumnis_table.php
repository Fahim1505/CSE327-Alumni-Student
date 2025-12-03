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
    Schema::create('alumnis', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();      // unique email for each alumni
        $table->string('password');             // will be hashed using Hash::make()
        $table->string('reg_no')->nullable();   // optional registration no.
        $table->string('department')->nullable();
        $table->year('graduation_year')->nullable();
        $table->timestamps();                   // created_at & updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};

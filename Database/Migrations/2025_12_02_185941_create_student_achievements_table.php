<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void    //migration function
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');    //achievements table attributes
            $table->string('first_name');   //student_id, first_name, last_name, department, title, department, title, description, imagePath
            $table->string('last_name');
            $table->string('department');
            $table->string('title');
            $table->text('description');
            $table->string('imagePath')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void    //reverse migration function
    {
        Schema::dropIfExists('student_achievements');
    }
};

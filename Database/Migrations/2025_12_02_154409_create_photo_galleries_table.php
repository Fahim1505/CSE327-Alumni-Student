<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   public function up()     //migration function
{
    Schema::create('photo_galleries', function (Blueprint $table) {
        $table->id();
        $table->string('name');     //table columns name, filepath, caption, graduationYear, uploadedAt
        $table->string('filePath');
        $table->string('caption');
        $table->string('graduationYear');
        $table->timestamp('uploadedAt')->nullable();
        $table->timestamps();
    });
}


    //reverse migration
    public function down(): void
    {
        Schema::dropIfExists('photo_galleries');
    }
};

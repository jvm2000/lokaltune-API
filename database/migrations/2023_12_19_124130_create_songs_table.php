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
        Schema::create('songs', function (Blueprint $table) {
            $table->uuid();
            $table->string('title');
            $table->string('duration');
            $table->string('genre');
            $table->text('lyrics');
            $table->text('image');
            $table->text('file_mp3');
            $table->foreignUuid(\App\Models\Artist::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};

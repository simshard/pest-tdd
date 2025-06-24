<?php

use App\Models\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class);
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('description');
            $table->string('video_file');
            $table->timestamps();
    }
    );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};

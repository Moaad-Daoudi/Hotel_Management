<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('alt_text')->nullable(); // Description for accessibility and SEO
            $table->integer('order')->default(0); // Display order for a gallery
            $table->morphs('imageable'); // The magic! Creates `imageable_id` and `imageable_type` (belong to the model that have id imageable_id) to link to any model.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};


// A single, flexible table to handle all image uploads for hotels, rooms, etc.
// Hotel Owner: Uploads and manages images for their properties and rooms.
// Maintenance Staff: Can upload images for maintenance requests.

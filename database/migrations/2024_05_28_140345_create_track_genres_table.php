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
        Schema::create('track_genres', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Track::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Genre::class)->constrained()->cascadeOnDelete();
            $table->primary([ 'track_id', 'genre_id' ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('track_genres');
    }
};

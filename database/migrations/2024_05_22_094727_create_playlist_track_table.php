<?php

use App\Models\playlist;
use App\Models\source;
use App\Models\track;
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
        Schema::create('playlist_track', function (Blueprint $table) {
            $table->id();
            $table->string('identity');
            $table->foreignIdFor(playlist::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(track::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(source::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_track');
    }
};

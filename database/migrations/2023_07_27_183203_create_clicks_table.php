<?php

use App\Models\Jobs\Listing;
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
        Schema::create('job_clicks', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('listing_id');
            
            $table->foreign('listing_id')
                ->references('id')
                ->on('job_listings')
                ->constrained()
                ->cascadeOnDelete();
            
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clicks');
    }
};

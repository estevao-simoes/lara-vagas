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
        Schema::table('job_clicks', function (Blueprint $table) {
            $table->foreignUuid('subscriber_id')
                ->nullable()
                ->constrained('subscribers')
                ->onDelete('cascade')
                ->after('referer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_clicks', function (Blueprint $table) {
            $table->dropForeign(['subscriber_id']);
            $table->dropColumn('subscriber_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->foreignId('recruitment_batch_id')->nullable()->after('status')->constrained()->nullOnDelete();
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->foreignId('recruitment_batch_id')->nullable()->after('content')->constrained()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('recruitment_batch_id');
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->dropConstrainedForeignId('recruitment_batch_id');
        });
    }
};

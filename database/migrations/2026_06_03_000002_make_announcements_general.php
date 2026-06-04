<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            if (Schema::hasColumn('announcements', 'job_posting_id')) {
                $table->dropConstrainedForeignId('job_posting_id');
            }
            if (Schema::hasColumn('announcements', 'stage')) {
                $table->dropColumn('stage');
            }
            if (! Schema::hasColumn('announcements', 'featured_image')) {
                $table->string('featured_image')->nullable()->after('slug');
            }
        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            if (Schema::hasColumn('announcements', 'featured_image')) {
                $table->dropColumn('featured_image');
            }
            if (! Schema::hasColumn('announcements', 'stage')) {
                $table->string('stage')->default('umum')->after('content');
            }
            if (! Schema::hasColumn('announcements', 'job_posting_id')) {
                $table->foreignId('job_posting_id')->nullable()->after('stage')->constrained()->nullOnDelete();
            }
        });
    }
};

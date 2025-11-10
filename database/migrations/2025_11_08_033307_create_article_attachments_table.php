<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('article_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type')->nullable();
            $table->unsignedBigInteger('file_size')->nullable(); // in bytes
            $table->string('mime_type')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('download_count')->default(0);
            $table->timestamps();

            // Indexes
            $table->index('article_id');
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_attachments');
    }
};
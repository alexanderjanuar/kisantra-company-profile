<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('location');
            $table->enum('employment_type', ['full_time', 'part_time', 'contract', 'internship'])->default('full_time');
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->longText('requirements')->nullable();
            $table->datetime('application_deadline')->nullable();
            $table->enum('status', ['draft', 'active', 'closed'])->default('draft');
            $table->enum('work_type', ['onsite', 'remote', 'hybrid'])->default('onsite');
            $table->timestamps();

            // Indexes for better performance
            $table->index('status');
            $table->index('employment_type');
            $table->index('work_type');
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_postings');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('category', ['Perpajakan', 'Keuangan', 'Perizinan', 'Digital']);
            $table->text('description');
            $table->string('price');
            $table->string('price_note')->nullable();
            $table->json('features')->nullable(); // Store features as JSON array
            
            // Smart Filter Fields - NEW!
            $table->json('target_business_types')->nullable(); // ['new', 'umkm', 'company', 'personal']
            $table->json('target_pkp_status')->nullable(); // ['yes', 'no', 'not_sure']
            $table->json('search_keywords')->nullable(); // ['SPT', 'Masa', 'NIB', etc.]
            $table->integer('recommendation_priority')->default(0); // Higher = show first in recommendations
            
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('category');
            $table->index('is_active');
            $table->index('order');
            $table->index('slug');
            $table->index('recommendation_priority');
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
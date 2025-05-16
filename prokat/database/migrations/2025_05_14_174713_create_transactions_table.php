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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount');
            $table->text('comment')->nullable();
            $table->enum('type', ['доход', 'расход', 'перемещение']);
            $table->timestamp('created_at');

            $table->foreignId('primary_account')->constrained('accounts');
            $table->foreignId('secondary_account')->nullable()->constrained('accounts');
            $table->foreignId('spending_category')->nullable()->constrained('spending_categories');
            $table->foreignId('income_source')->nullable()->constrained('income_sources');
            $table->foreignId('project')->nullable()->constrained('projects');
            $table->foreignId('order')->nullable()->constrained('orders')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

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
        Schema::table('accounts', function (Blueprint $table) {
            DB::statement('ALTER TABLE accounts ALTER COLUMN amount TYPE INTEGER USING ROUND(amount)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            DB::statement('ALTER TABLE accounts ALTER COLUMN amount TYPE DOUBLE PRECISION');
        });
    }
};

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
        Schema::table('price_lists', function (Blueprint $table) {
            DB::statement('ALTER TABLE price_lists ALTER COLUMN price_for_period TYPE INTEGER USING ROUND(price_for_period)');
            DB::statement('ALTER TABLE price_lists ALTER COLUMN deposit_for_period TYPE INTEGER USING ROUND(deposit_for_period)');
            DB::statement('ALTER TABLE price_lists ALTER COLUMN full_price_for_period TYPE INTEGER USING ROUND(full_price_for_period)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('price_lists', function (Blueprint $table) {
            DB::statement('ALTER TABLE price_lists ALTER COLUMN price_for_period TYPE DOUBLE PRECISION');
            DB::statement('ALTER TABLE price_lists ALTER COLUMN deposit_for_period TYPE DOUBLE PRECISION');
            DB::statement('ALTER TABLE price_lists ALTER COLUMN full_price_for_period TYPE DOUBLE PRECISION');
        });
    }
};

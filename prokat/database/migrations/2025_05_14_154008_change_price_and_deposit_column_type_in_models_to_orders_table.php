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
        Schema::table('models_to_orders', function (Blueprint $table) {
            DB::statement('ALTER TABLE models_to_orders ALTER COLUMN price TYPE INTEGER USING ROUND(price)');
            DB::statement('ALTER TABLE models_to_orders ALTER COLUMN deposit TYPE INTEGER USING ROUND(deposit)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('models_to_orders', function (Blueprint $table) {
            DB::statement('ALTER TABLE models_to_orders ALTER COLUMN price TYPE DOUBLE PRECISION');
            DB::statement('ALTER TABLE models_to_orders ALTER COLUMN deposit TYPE DOUBLE PRECISION');
        });
    }
};

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
        Schema::table('orders', function (Blueprint $table) {
            DB::statement('ALTER TABLE orders ALTER COLUMN delivery_price TYPE INTEGER USING ROUND(delivery_price)');
            DB::statement('ALTER TABLE orders ALTER COLUMN total_amount TYPE INTEGER USING ROUND(total_amount)');
            DB::statement('ALTER TABLE orders ALTER COLUMN total_deposit TYPE INTEGER USING ROUND(total_deposit)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            DB::statement('ALTER TABLE orders ALTER COLUMN delivery_price TYPE DOUBLE PRECISION');
            DB::statement('ALTER TABLE orders ALTER COLUMN total_amount TYPE DOUBLE PRECISION');
            DB::statement('ALTER TABLE orders ALTER COLUMN total_deposit TYPE DOUBLE PRECISION');
        });
    }
};

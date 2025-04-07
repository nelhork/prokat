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
        Schema::table('items', function (Blueprint $table)
        {
            $table->unsignedBigInteger('stock_id')->nullable()->change();
        });

        Schema::table('movements', function (Blueprint $table)
        {
            $table->unsignedBigInteger('from_stock_id')->nullable()->change();
            $table->unsignedBigInteger('to_stock_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table)
        {
            $table->unsignedBigInteger('stock_id')->change();
        });

        Schema::table('movements', function (Blueprint $table)
        {
            $table->unsignedBigInteger('from_stock_id')->change();
            $table->unsignedBigInteger('to_stock_id')->change();
        });
    }
};

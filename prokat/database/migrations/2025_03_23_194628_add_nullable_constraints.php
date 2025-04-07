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
        Schema::table('clients', function (Blueprint $table)
        {
            $table->string('phone2')->nullable()->change();
            $table->string('phone3')->nullable()->change();
            $table->float('discount')->nullable()->change();
            $table->text('history')->nullable()->change();
        });

        Schema::table('orders', function (Blueprint $table)
        {
            $table->string('comment')->nullable()->change();
            $table->string('delivery_address_to')->nullable()->change();
            $table->string('delivery_address_from')->nullable()->change();
            $table->float('delivery_price')->nullable()->change();
            $table->float('total_amount')->nullable()->change();
            $table->float('total_deposit')->nullable()->change();

            $table->unsignedBigInteger('status_id')->nullable()->change();
            $table->unsignedBigInteger('giver_id')->nullable()->change();
            $table->unsignedBigInteger('taker_id')->nullable()->change();
            $table->unsignedBigInteger('take_stock_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table)
        {
            $table->string('phone2')->change();
            $table->string('phone3')->change();
            $table->float('discount')->change();
            $table->text('history')->change();
        });

        Schema::table('orders', function (Blueprint $table)
        {
            $table->string('comment')->change();
            $table->timestamp('begin_at')->change();
            $table->timestamp('end_at')->change();
            $table->string('delivery_address_to')->change();
            $table->string('delivery_address_from')->change();
            $table->float('delivery_price')->change();
            $table->float('total_amount')->change();
            $table->float('total_deposit')->change();

            $table->unsignedBigInteger('status_id')->change();
            $table->unsignedBigInteger('client_id')->change();
            $table->unsignedBigInteger('giver_id')->change();
            $table->unsignedBigInteger('taker_id')->change();
            $table->unsignedBigInteger('give_stock_id')->change();
            $table->unsignedBigInteger('take_stock_id')->change();
        });
    }
};

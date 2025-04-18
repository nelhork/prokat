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
            $table->unsignedBigInteger('payment_account_id');
            $table->unsignedBigInteger('deposit_account_id');
            $table->unsignedBigInteger('return_account_id');

            $table->foreign('payment_account_id')
                ->references('id')
                ->on('accounts')
                ->onUpdate('cascade');

            $table->foreign('deposit_account_id')
                ->references('id')
                ->on('accounts')
                ->onUpdate('cascade');

            $table->foreign('return_account_id')
                ->references('id')
                ->on('accounts')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};

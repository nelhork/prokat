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
        Schema::table('transactions', function (Blueprint $table) {
            $table->renameColumn('primary_account', 'primary_account_id');
            $table->renameColumn('secondary_account', 'secondary_account_id');
            $table->renameColumn('spending_category', 'spending_category_id');
            $table->renameColumn('income_source', 'income_source_id');
            $table->renameColumn('project', 'project_id');
            $table->renameColumn('order', 'order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->renameColumn('primary_account_id', 'primary_account');
            $table->renameColumn('secondary_account_id', 'secondary_account');
            $table->renameColumn('spending_category_id', 'spending_category');
            $table->renameColumn('income_source_id', 'income_source');
            $table->renameColumn('project_id', 'project');
            $table->renameColumn('order_id', 'order');
        });
    }
};

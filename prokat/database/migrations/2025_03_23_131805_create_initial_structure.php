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
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->string('name');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('phone3');
            $table->float('discount');
            $table->text('history');
            $table->timestamps();
        });

        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->string('name');
            $table->string('type');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->string('video1');
            $table->string('video2');
            $table->string('video3');
            $table->string('description1');
            $table->string('description2');
            $table->string('description3');
            $table->timestamps();
        });

        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->float('price_for_period');
            $table->float('deposit_for_period');
            $table->float('full_price_for_period');
            $table->float('period_min');
            $table->float('period_max');
            $table->unsignedBigInteger('model_id');

            $table->foreign('model_id')
                ->references('id')
                ->on('models')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('name');
            $table->string('comment');
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->string('name');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('phone3');
            $table->string('login');
            $table->string('password');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->string('name');
            $table->float('amount');
            $table->timestamps();
        });

        Schema::create('money_movements', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->string('comment');
            $table->unsignedBigInteger('from_account_id');
            $table->unsignedBigInteger('to_account_id');
            $table->timestamps();

            $table->foreign('from_account_id')
                ->references('id')
                ->on('accounts')
                ->onUpdate('cascade');

            $table->foreign('to_account_id')
                ->references('id')
                ->on('accounts')
                ->onUpdate('cascade');
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->string('status');

            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('stock_id');

            $table->timestamps();

            $table->foreign('model_id')
                ->references('id')
                ->on('models')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('stock_id')
                ->references('id')
                ->on('stocks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->string('comment');

            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('from_stock_id');
            $table->unsignedBigInteger('to_stock_id');
            $table->timestamps();

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onUpdate('cascade');

            $table->foreign('from_stock_id')
                ->references('id')
                ->on('stocks')
                ->onUpdate('cascade');

            $table->foreign('to_stock_id')
                ->references('id')
                ->on('stocks')
                ->onUpdate('cascade');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->timestamp('begin_at');
            $table->timestamp('end_at');
            $table->string('delivery_address_to');
            $table->string('delivery_address_from');
            $table->float('delivery_price');
            $table->float('total_amount');
            $table->float('total_deposit');

            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('giver_id');
            $table->unsignedBigInteger('taker_id');
            $table->unsignedBigInteger('give_stock_id');
            $table->unsignedBigInteger('take_stock_id');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('cascade');

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onUpdate('cascade');

            $table->foreign('giver_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade');

            $table->foreign('taker_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade');

            $table->foreign('give_stock_id')
                ->references('id')
                ->on('stocks')
                ->onUpdate('cascade');

            $table->foreign('take_stock_id')
                ->references('id')
                ->on('stocks')
                ->onUpdate('cascade');
        });

        Schema::create('models_to_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('count');
            $table->float('price');
            $table->float('deposit');

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('model_id');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade');

            $table->foreign('model_id')
                ->references('id')
                ->on('models')
                ->onUpdate('cascade');

            $table->unique(['order_id', 'model_id']);
        });

        Schema::create('items_to_orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_id');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onUpdate('cascade');

            $table->unique(['order_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        throw new Exception('not implemented');
    }
};

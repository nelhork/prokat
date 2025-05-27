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
        Schema::table('models', function (Blueprint $table) {
            $table->string('comment')->nullable()->change();
            $table->string('photo2')->nullable()->change();
            $table->string('photo3')->nullable()->change();
            $table->string('video1')->nullable()->change();
            $table->string('video2')->nullable()->change();
            $table->string('video3')->nullable()->change();
            $table->string('description1')->nullable()->change();
            $table->string('description2')->nullable()->change();
            $table->string('description3')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('models', function (Blueprint $table) {
            $table->string('comment')->nullable(false)->change();
            $table->string('photo2')->nullable(false)->change();
            $table->string('photo3')->nullable(false)->change();
            $table->string('video1')->nullable(false)->change();
            $table->string('video2')->nullable(false)->change();
            $table->string('video3')->nullable(false)->change();
            $table->string('description1')->nullable(false)->change();
            $table->string('description2')->nullable(false)->change();
            $table->string('description3')->nullable(false)->change();
        });
    }
};

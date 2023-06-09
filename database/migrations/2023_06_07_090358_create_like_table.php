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
        Schema::disableForeignKeyConstraints();

        Schema::create('like', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            $table->bigInteger('guideId');
            $table->foreign('guideId')->references('id')->on('guides');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like');
    }
};

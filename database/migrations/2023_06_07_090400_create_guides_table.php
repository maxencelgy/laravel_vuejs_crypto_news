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

        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('image')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->bigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};

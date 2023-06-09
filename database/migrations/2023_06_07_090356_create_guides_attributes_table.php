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

        Schema::create('guides_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guideId');
            $table->foreign('guideId')->references('id')->on('guides');
            $table->integer('like');
            $table->integer('comment');
            $table->integer('note');
            $table->integer('nbrConsultation');
            $table->integer('timeRealization');
            $table->boolean('reported');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides_attributes');
    }
};

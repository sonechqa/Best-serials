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
        Schema::create('genres_serials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('genres_id');
            $table->unsignedBigInteger('serials_id');
            $table->foreign('genres_id')->references('id')->on('genres');
            $table->foreign('serials_id')->references('id')->on('serials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres_serials');
    }
};

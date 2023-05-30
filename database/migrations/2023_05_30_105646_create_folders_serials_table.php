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
        Schema::create('folders_serials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folders_id');
            $table->unsignedBigInteger('serials_id');
            $table->foreign('folders_id')->references('id')->on('folders');
            $table->foreign('serials_id')->references('id')->on('serials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders_serials');
    }
};

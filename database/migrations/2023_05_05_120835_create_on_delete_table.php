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
        Schema::table('genres_serials', function (Blueprint $table) {
            $table->dropForeign('genres_serials_serials_id_foreign');
            $table->foreign('serials_id')->references('id')->on('serials')->onDelete('cascade');
        });

        Schema::table('countries_serials', function (Blueprint $table) {
            $table->dropForeign('countries_serials_serials_id_foreign');
            $table->foreign('serials_id')->references('id')->on('serials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {}
};

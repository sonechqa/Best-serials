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
        Schema::table('folders', function (Blueprint $table) {
            $table->renameColumn('users_id', 'user_id');
            $table->dropForeign('folders_users_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('folders', function (Blueprint $table) {
            $table->renameColumn('user_id', 'users_id');
            $table->dropForeign('folders_user_id_foreign');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};

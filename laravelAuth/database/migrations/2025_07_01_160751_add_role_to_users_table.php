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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('role')->default(false)->comment('Si true(1), l\'utilisateur est un administrateur')->after('password');
            $table->boolean('is_delete')->default(false)->comment('Si true(1), l\'utilisateur est désactivé')->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'is_delete']);
        });
    }
};

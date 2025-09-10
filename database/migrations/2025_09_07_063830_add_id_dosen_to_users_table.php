<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'id_dosen')) {
                $table->unsignedBigInteger('id_dosen')->nullable()->after('role');
                $table->foreign('id_dosen')
                      ->references('id')
                      ->on('ms_dosen')
                      ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'id_dosen')) {
                $table->dropForeign(['id_dosen']);
                $table->dropColumn('id_dosen');
            }
        });
    }
};

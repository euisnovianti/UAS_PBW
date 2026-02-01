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
        Schema::table('angkots', function (Blueprint $table) {
            //
            $table->text('route_coords')->nullable()->after('jalur_rute');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('angkots', function (Blueprint $table) {
            //
            $table->dropColumn('route_coords');
        });
    }
};

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
        if (!Schema::hasColumn('models', 'model_warranty')) {
            Schema::table('models', function (Blueprint $table) {
                $table->integer('model_warranty')->nullable(); // Add warranty column
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('models', function (Blueprint $table) {
            //
            $table->dropColumn('model_warranty'); // Remove warranty column

        });
    }
};

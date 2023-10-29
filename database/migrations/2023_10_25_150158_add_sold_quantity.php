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
      Schema::table('watches', function ($table) {
            $table->integer('sold');
            $table->integer('admin_sold');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('watches', function ($table) {
            $table->dropColumn(['sold', 'admin_sold']);

        });
    }
};

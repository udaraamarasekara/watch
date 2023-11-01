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
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('price');
            $table->integer('quantity');
            $table->foreignId('watch_id')->constrained();
            $table->morphs('orderable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['watch_id']);
            $table->dropColumn(['price','quantity','orderable_id','orderable_type']);
        });
    }
};

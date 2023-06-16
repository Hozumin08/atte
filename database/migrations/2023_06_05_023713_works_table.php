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
        Schema::create('Works', function (Blueprint $table) {
        $table->id();
        $table->unsignedinteger('user_id');
        $table->date('date')->nullable();
        $table->time('work_start')->nullable();
        $table->time('work_end')->nullable();
        $table->timestamp('created_at')->useCurrent()->nullable();
        $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Works');
    }
};

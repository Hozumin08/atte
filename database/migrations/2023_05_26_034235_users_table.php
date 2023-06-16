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
        Schema::create('Users', function (Blueprint $table) {
        $table->id();
        $table->string('name',255);
        $table->string('email',255);
        $table->string('password',255);
        $table->char('remember_token',100)->nullable();
        $table->timestamp('created_at')->useCurrent()->nullable();
        $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::dropIfExists('Users');
    }
};

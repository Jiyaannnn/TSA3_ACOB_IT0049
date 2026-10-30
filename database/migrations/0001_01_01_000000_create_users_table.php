<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('full_name', 100);
            $table->dateTime('created_at');
            $table->string('email', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

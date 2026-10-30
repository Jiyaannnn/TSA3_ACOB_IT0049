<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('full_name', 100);
            $table->dateTime('created_at');
            // Additional Soluna fields preserve the TFA5 directory and filters.
            $table->string('code')->default('');
            $table->string('role')->default('');
            $table->string('team')->default('');
            $table->string('location')->default('');
            $table->string('status')->default('');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};

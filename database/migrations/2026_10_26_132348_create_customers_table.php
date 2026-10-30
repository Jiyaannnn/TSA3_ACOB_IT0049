<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 100);
            $table->string('email', 100);
            $table->string('phone', 20)->nullable();
            $table->dateTime('created_at');
            // Additional Soluna fields preserve the TFA5 directory and filters.
            $table->string('code')->default('');
            $table->string('location')->default('');
            $table->string('project')->default('');
            $table->string('capacity')->default('');
            $table->string('status')->default('');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

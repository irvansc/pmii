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
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('file_name')->nullable();
            $table->string("file_size")->nullable();
            $table->string("file_ext")->nullable();
            $table->string("file_type")->nullable();
            $table->text('file_ket')->nullable();
            $table->integer('ordering')->default(10000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};

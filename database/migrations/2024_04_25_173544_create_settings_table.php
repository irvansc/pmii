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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('web_name')->nullable();
            $table->string('web_url')->nullable();
            $table->string('web_tagline')->nullable();
            $table->string('web_email')->nullable();
            $table->string('web_email_noreply')->nullable();
            $table->string('web_telp')->nullable();
            $table->text('web_maps')->nullable();
            $table->text('web_desc')->nullable();
            $table->text('web_alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')
                  ->unique();
            $table->timestamp('email_verified_at')
                  ->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('phone')
                  ->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan'])
                  ->nullable();
            $table->date('birth_date')
                  ->nullable();
            $table->text('address')
                  ->nullable();
            $table->text('about')
                  ->nullable();
            $table->string('path_image')
                  ->nullable();
            $table->enum('status', ['Anggota', 'Alumni'])->default('Anggota');
            $table->string('thn')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('sd')->nullable();
            $table->string('smp')->nullable();
            $table->string('sma')->nullable();
            $table->string('s1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

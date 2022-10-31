<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi_users', function (Blueprint $table) {
            $table->foreignId('presensi_id');
            $table->foreignId('user_id');
            $table->primary(['presensi_id', 'user_id']);
            $table->enum('status', ['hadir', 'izin', 'sakit']);
            $table->timestamps();

            $table->foreign('presensi_id')->references('id')->on('presensi')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi_users');
    }
};

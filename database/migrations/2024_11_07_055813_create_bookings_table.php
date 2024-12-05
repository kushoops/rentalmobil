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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->string('nama');
            $table->string('telp');
            $table->string('email');
            $table->string('alamat');
            $table->date('tglmulaisewa');
            $table->date('tglakhirsewa');
            $table->string('mobil');
            $table->string('platno');
            $table->boolean('driver');
            $table->integer('total');
            $table->string('pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

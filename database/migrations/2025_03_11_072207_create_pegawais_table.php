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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->char('nip', 20)->unique();
            $table->string('nama', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('golongan', 10);
            $table->string('eselon', 10)->nullable();
            $table->string('jabatan', 100);
            $table->string('tempat_tugas', 100);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->string('unit_kerja', 100);
            $table->string('no_hp', 20);
            $table->string('npwp', 20)->nullable();
            $table->string('foto', 255)->nullable();
            $table->timestamps();
            $table->softDeletes(); // Menyediakan fitur penghapusan sementara
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};


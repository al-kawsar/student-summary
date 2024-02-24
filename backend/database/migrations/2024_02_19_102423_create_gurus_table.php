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
        Schema::create('gurus', function (Blueprint $table) {
            $table->foreignId('id_guru');
            $table->string('nama',100);
            $table->string('status',50);
            $table->string('pendidikan',50);
            $table->string('mata_pelajaran',50);
            $table->string('nip',50)->unique();
            $table->string('pangkat_golongan',50);
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->string('agama',50);
            $table->string('tempat_tgl_lahir',50);
            $table->string('alamat',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};

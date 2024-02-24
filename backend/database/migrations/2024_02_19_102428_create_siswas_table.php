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
        Schema::create('siswas', function (Blueprint $table) {
            // $table->foreignId('id_siswa');
            $table->string('username', 100)->unique();
            $table->string('nama', 50);
            $table->string('nisn', 10)->unique();
            $table->string('nis', 12);
            $table->string('jurusan', 50);
            $table->string('agama', 50);
            $table->text('alamat');
            $table->string('tempat_tgl_lahir', 50);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};

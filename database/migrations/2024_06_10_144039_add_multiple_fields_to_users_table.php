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
        Schema::table('users', function (Blueprint $table) {
			$table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->text('alamat')->nullable();
			$table->string('no_telepon')->nullable();
			$table->enum('tipe_pengguna', ['Dokter', 'Pasien', 'Admin'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('jenis_kelamin');
			$table->dropColumn('tanggal_lahir');
			$table->dropColumn('alamat');
			$table->dropColumn('no_telepon');
			$table->dropColumn('tipe_pengguna');
        });
    }
};

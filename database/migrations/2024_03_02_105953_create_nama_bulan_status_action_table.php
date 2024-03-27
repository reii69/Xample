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
        Schema::create('nama_bulan_status_action', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name'); // Mengganti 'nama' menjadi 'name'
            $table->enum('bulan', ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
            $table->enum('status', ['Belum Bayar', 'Sukses'])->default('Belum Bayar');
            $table->decimal('nominal', 15, 2)->default(250000.00); // Kolom nominal dengan nilai default Rp. 250.000,00
            $table->timestamps();
        });
    }
    
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nama_bulan_status_action');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('no_trans', 20);
            $table->date('tgl_trans');
            $table->smallInteger('id_table');
            $table->smallInteger('id_cashier');
            $table->string('kd_cus');
            $table->string('nm_cus');
            $table->integer('gtotal_trans');
            $table->integer('diskon_trans');
            $table->integer('pay_trans'); // jumlah pembayaran transaksi
            $table->string('type_payment_trans', 20); // tunai / ewallet
            $table->string('payment_with_trans', 50)->nullable(); // ini di isi jika pembayaran dengan ewallet 
            $table->string('number_card_trans', 50)->nullable(); // ini di isi jika pembayaran dengan ewallet
            $table->string('status_trans', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('kd_menu', 15);
            $table->string('nm_menu', 50);
            $table->smallInteger('id_categ_menu');
            $table->integer('harga_menu');
            $table->smallInteger('id_kitchen_menu');
            $table->string('satuan_menu', 15);
            $table->text('desc_menu')->nullable();
            $table->text('foto')->nullable();
            $table->enum('stok',['A', 'NA']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

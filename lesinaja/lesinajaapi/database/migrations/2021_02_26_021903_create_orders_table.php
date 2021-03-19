<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('email_user');
            $table->integer('id_guru');
            $table->string('jenjang_pendidikan');
            $table->integer('jenjang_kelas');
            $table->integer('durasi_belajar');
            $table->integer('total_bulan');
            $table->string('hari');
            $table->string('jam_mulai');
            $table->string('pertemuan_pertama');
            $table->string('prefrensi_gender_guru');
            $table->text('pesan_tambahan');
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
        Schema::dropIfExists('orders');
    }
}

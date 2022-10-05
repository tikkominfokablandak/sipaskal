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
        Schema::create('suratmasuks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pengirim')->unsigned()->index();
            $table->string('nama_pengirim')->nullable();
            $table->string('jabatan_pengirim')->nullable();
            $table->string('instansi_pengirim')->nullable();
            $table->unsignedInteger('id_jenissurat')->index();
            $table->string('sifat_surat');
            $table->string('tingkat_urgen');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->date('tgl_diterima')->nullable();
            $table->string('perihal');
            $table->string('isi');
            $table->string('file_surat');
            $table->string('lamp_surat');
            $table->integer('id_tujuan')->unsigned()->index();
            $table->string('nama_tujuan')->nullable();
            $table->string('jabatan_tujuan')->nullable();
            $table->string('instansi_tujuan')->nullable();
            $table->string('tembusan');
            $table->string('ket');
            $table->string('no_agenda');
            $table->unsignedInteger('id_status')->index();
            $table->unsignedInteger('id_create')->index();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suratmasuks');
    }
};

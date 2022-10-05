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
        Schema::create('tujuans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_tujuan');
            $table->integer('id_internal')->unsigned()->index();
            $table->string('nama_tujuan')->nullable();
            $table->string('jabatan_tujuan')->nullable();
            $table->string('instansi_tujuan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kotakab')->nullable();
            $table->integer('id_create')->unsigned()->index();
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
        Schema::dropIfExists('tujuanexternals');
    }
};

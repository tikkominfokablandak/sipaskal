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
        Schema::create('logsurats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sm')->unsigned()->index();
            $table->integer('id_sk')->unsigned()->index();
            $table->integer('id_tujuan')->unsigned()->index();
            $table->integer('id_pengirim')->unsigned()->index();
            $table->integer('id_tembusan')->unsigned()->index();
            $table->integer('id_verifikator')->unsigned()->index();
            $table->integer('id_ttd')->unsigned()->index();
            $table->integer('id_disposisi')->unsigned()->index();
            $table->integer('id_status')->unsigned()->index();
            $table->string('read')->nullable();
            $table->integer('id_create')->unsigned()->index();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('logsurats', function (Blueprint $table) {
            $table->foreign('id_sm')
            ->references('id')
            ->on('suratmasuks')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_sk')
            ->references('id')
            ->on('suratkeluars')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('id_tujuan')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_pengirim')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_tembusan')
            ->references('id')
            ->on('tembusans')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_verifikator')
            ->references('id')
            ->on('verifikators')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_ttd')
            ->references('id')
            ->on('tandatangans')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_disposisi')
            ->references('id')
            ->on('disposisis')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_status')
            ->references('id')
            ->on('statuss')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_create')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logsurats');
    }
};

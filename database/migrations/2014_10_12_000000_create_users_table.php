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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_role')->index();
            $table->char('nip',18);
            $table->char('nik',16);
            $table->string('nama');
            $table->char('no_hp',15);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('id_opd')->unsigned()->index();
            $table->integer('id_unitkerja')->unsigned()->index();
            $table->integer('id_jabatan')->unsigned()->index();
            $table->string('pangkat');
            $table->string('jenis_user');
            $table->string('foto')->default('user.jpg');
            $table->enum('active', [0, 1])->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

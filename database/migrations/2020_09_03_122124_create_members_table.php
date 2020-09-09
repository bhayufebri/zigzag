<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nik')->nullable();
            $table->string('lembaga')->nullable();
            $table->string('bank')->nullable();
            $table->text('rekening')->nullable();

            $table->string('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('no_handphone')->nullable();
            $table->text('password')->nullable();


            $table->string('status')->nullable();
            $table->date('tanggal_keluar')->nullable();

            $table->string('type')->nullable();
            $table->string('image')->nullable();


            $table->softDeletes();

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
        Schema::dropIfExists('members');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->text('alamat');
            $table->string('telepon');
            $table->string('sosmed_fb')->nullable();
            $table->string('sosmed_tw')->nullable();
            $table->string('sosmed_ig')->nullable();
            $table->string('pendidikan');
            $table->string('kemampuan');
            $table->string('cv');
            $table->string('username')->unique();
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelamar', function (Blueprint $table) {
            //
        });
    }
}

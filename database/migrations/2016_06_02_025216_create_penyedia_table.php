<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyedia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->text('alamat');
            $table->integer('id_kategori')->unsigned();
            $table->foreign('id_kategori')
                ->references('id')
                ->on('kategori')
                ->onDelete('cascade');
            $table->string('website')->nullable();
            $table->string('telepon');
            $table->string('sosmed_fb')->nullable();
            $table->string('logo');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('status', [0,1]);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penyedia');
    }
}

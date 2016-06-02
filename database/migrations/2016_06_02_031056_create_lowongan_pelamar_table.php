<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLowonganPelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lowongan_pelamar', function (Blueprint $table) {
            $table->integer('id_lowongan')->unsigned();
            $table->integer('id_pelamar')->unsigned();

            $table->foreign('id_pelamar')
                ->references('id')
                ->on('pelamar')
                ->onDelete('casecade');
            $table->foreign('id_lowongan')
                ->references('id')
                ->on('lowongan')
                ->onDelete('casecade');
            $table->primary(['id_lowongan', 'id_pelamar']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lowongan_pelamar');
    }
}

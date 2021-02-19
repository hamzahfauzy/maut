<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToAlternatif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            //
            $table->string('NIK')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('no_sk_pertama')->nullable();
            $table->string('tanggal_sk_pertama')->nullable();
            $table->string('no_sk_terakhir')->nullable();
            $table->string('tanggal_sk_terakhir')->nullable();
            $table->string('jenis_jabatan')->nullable();
            $table->string('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            //
            $table->dropColumn([
                'NIK',
                'tempat_lahir',
                'tanggal_lahir',
                'pendidikan_terakhir',
                'no_sk_pertama',
                'tanggal_sk_pertama',
                'no_sk_terakhir',
                'tanggal_sk_terakhir',
                'jenis_jabatan',
                'alamat',
            ]);
        });
    }
}

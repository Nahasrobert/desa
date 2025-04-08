<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistemDesaTables extends Migration
{
    public function up()
    {
        Schema::create('dusuns', function (Blueprint $table) {
            $table->uuid('dusun_id')->primary();
            $table->string('nama_dusun', 100);
            $table->timestamps();
        });

        Schema::create('rws', function (Blueprint $table) {
            $table->uuid('rw_id')->primary();
            $table->uuid('dusun_id');
            $table->string('nomor_rw', 10);
            $table->foreign('dusun_id')->references('dusun_id')->on('dusuns')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('rts', function (Blueprint $table) {
            $table->uuid('rt_id')->primary();
            $table->uuid('rw_id');
            $table->string('nomor_rt', 10);
            $table->foreign('rw_id')->references('rw_id')->on('rws')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('kepala_keluargas', function (Blueprint $table) {
            $table->uuid('kk_id')->primary();
            $table->uuid('rt_id');
            $table->string('nama_kepala_keluarga', 100);
            $table->string('no_kk', 20)->unique();
            $table->text('alamat');
            $table->foreign('rt_id')->references('rt_id')->on('rts')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('penduduks', function (Blueprint $table) {
            $table->uuid('penduduk_id')->primary();
            $table->uuid('kk_id');
            $table->string('nama', 100);
            $table->string('nik', 20)->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama', 50)->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->foreign('kk_id')->references('kk_id')->on('kepala_keluargas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('pegawais', function (Blueprint $table) {
            $table->uuid('pegawai_id')->primary();
            $table->string('nama', 100);
            $table->string('jk', 100);
            $table->string('jabatan', 100);
            $table->string('email', 100)->unique()->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->timestamps();
        });

        Schema::create('riwayat_jabatans', function (Blueprint $table) {
            $table->uuid('riwayat_id')->primary();
            $table->uuid('pegawai_id');
            $table->string('jabatan', 100);
            $table->year('tahun_mulai');
            $table->year('tahun_selesai')->nullable();
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('surats', function (Blueprint $table) {
            $table->uuid('surat_id')->primary();
            $table->uuid('penduduk_id');
            $table->string('jenis_surat', 100);
            $table->date('tanggal_pengajuan');
            $table->enum('status', ['Diproses', 'Selesai', 'Ditolak'])->default('Diproses');
            $table->foreign('penduduk_id')->references('penduduk_id')->on('penduduks')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('artikels', function (Blueprint $table) {
            $table->uuid('artikel_id')->primary();
            $table->uuid('pegawai_id')->nullable();
            $table->string('judul', 200);
            $table->text('isi');
            $table->timestamp('tanggal_publikasi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('gambar', 255);
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('pengumumans', function (Blueprint $table) {
            $table->uuid('pengumuman_id')->primary();
            $table->uuid('pegawai_id')->nullable();
            $table->string('judul', 200);
            $table->text('isi');
            $table->timestamp('tanggal_publikasi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('gambar', 255);
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('layanans', function (Blueprint $table) {
            $table->uuid('layanan_id')->primary();
            $table->uuid('pegawai_id')->nullable();
            $table->string('nama_layanan', 200);
            $table->text('deskripsi');
            $table->string('gambar', 255);
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('galeris', function (Blueprint $table) {
            $table->uuid('galeri_id')->primary();
            $table->uuid('pegawai_id')->nullable();
            $table->string('judul', 200);
            $table->string('file_path', 255);
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('profils', function (Blueprint $table) {
            $table->uuid('profil_id')->primary();
            $table->uuid('pegawai_id')->nullable();
            $table->string('nama_desa', 100);
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('sambutan')->nullable();
            $table->text('sejarah')->nullable();
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profils');
        Schema::dropIfExists('galeris');
        Schema::dropIfExists('layanans');
        Schema::dropIfExists('pengumumans');
        Schema::dropIfExists('artikels');
        Schema::dropIfExists('surats');
        Schema::dropIfExists('riwayat_jabatans');
        Schema::dropIfExists('pegawais');
        Schema::dropIfExists('penduduks');
        Schema::dropIfExists('kepala_keluargas');
        Schema::dropIfExists('rts');
        Schema::dropIfExists('rws');
        Schema::dropIfExists('dusuns');
    }
}

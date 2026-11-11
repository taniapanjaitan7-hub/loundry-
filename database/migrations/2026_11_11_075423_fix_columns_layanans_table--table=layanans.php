<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('layanans', 'nama_layanan')) {
            Schema::table('layanans', function (Blueprint $table) {
                $table->string('nama_layanan')->nullable();
            });
        }

        if (!Schema::hasColumn('layanans', 'harga')) {
            Schema::table('layanans', function (Blueprint $table) {
                $table->integer('harga')->default(0);
            });
        }

        if (!Schema::hasColumn('layanans', 'estimasi')) {
            Schema::table('layanans', function (Blueprint $table) {
                $table->string('estimasi')->nullable();
            });
        }
    }

    public function down(): void
    {
        //
    }
};
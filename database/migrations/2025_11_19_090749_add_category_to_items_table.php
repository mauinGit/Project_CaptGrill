<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('ingredients', function (Blueprint $table) {
        $table->enum('category', [
            'bahan_utama',
            'sayuran',
            'saus_bumbu',
            'bahan_tambahan',
            'kemasan',
        ])->after('unit')->nullable();
    });
}

public function down()
{
    Schema::table('ingredients', function (Blueprint $table) {
        $table->dropColumn('category');
    });
}

};

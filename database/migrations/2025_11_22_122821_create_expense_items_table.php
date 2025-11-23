<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expense_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_id')
                ->constrained('expenses')
                ->cascadeOnDelete();

            // kolom detail fleksibel sesuai kategori
            $table->string('employee_name')->nullable();        // untuk kategori gaji
            $table->decimal('base_salary', 15, 2)->nullable();
            $table->decimal('bonus', 15, 2)->nullable();

            $table->string('material_name')->nullable();        // untuk kategori bahan
            $table->integer('qty')->nullable();
            $table->decimal('price', 15, 2)->nullable();

            $table->text('description')->nullable();            // untuk pendukung
            $table->decimal('subtotal', 15, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expense_items');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrow_details', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('borrow_id');
            $table->string('book_id');
            $table->integer('counter');
            $table->string('status')->default('Dipinjam');
            $table->string('book_identity')->nullable();
            $table->string('borrowed_by')->nullable();
            $table->string('returned_by')->nullable();
            $table->timestamps();

            $table->foreign('borrow_id')->references('id')->on('borrow')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('borrowed_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('returned_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('borrow_details');
    }
};

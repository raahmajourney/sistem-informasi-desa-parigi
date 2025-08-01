<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('form_link')->nullable();
        $table->unsignedBigInteger('created_by');
        $table->timestamps();

        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
    });
}


};

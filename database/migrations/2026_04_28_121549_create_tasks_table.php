<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table ->string('titre');
            $table ->text('description');
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
           $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table ->enum('statut', ['todo', 'doing', 'done'])->default('todo');
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

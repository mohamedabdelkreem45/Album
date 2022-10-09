<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('album_pictures', function (Blueprint $table) {
            $table->id();
            $table->string('picture_name', 999);
            $table->foreignId('album_id')->constrained('albums', 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('album_pictures');
    }
};
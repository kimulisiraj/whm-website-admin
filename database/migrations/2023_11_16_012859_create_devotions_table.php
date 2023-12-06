<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up():void
    {
        Schema::create('devotionals', static function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('summary');
            $table->text('body');
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('devotionals');
    }
};

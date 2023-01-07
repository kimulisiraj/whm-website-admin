<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up():void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image');
            $table->string('title');
            $table->string('phase');
            $table->string('description')->nullable();
            $table->string('link');
            $table->string('link_text');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};

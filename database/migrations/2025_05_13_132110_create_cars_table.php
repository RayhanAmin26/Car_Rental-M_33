<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// database/migrations/xxxx_xx_xx_create_cars_table.php
Schema::create('cars', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('brand');
    $table->string('model');
    $table->integer('year');
    $table->string('car_type');
    $table->decimal('daily_rent_price', 8, 2);
    $table->boolean('availability')->default(true);
    $table->string('image')->nullable();
    $table->timestamps();
});



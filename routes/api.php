<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\DevotionalController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\SermonController;
use App\Http\Controllers\Api\TestimonyController;
use App\Http\Controllers\Api\LocationController;

use Illuminate\Support\Facades\Route;


Route::get('locations',[LocationController::class,'index']);
Route::get('locations/{location}', [LocationController::class, 'show']);
Route::get('sermons', SermonController::class);
Route::get('testimonies', [TestimonyController::class, 'index']);
Route::get('testimonies/{testimony}', [TestimonyController::class, 'show']);
Route::get('events/live', [EventController::class, 'live']);
Route::get('events/up-coming', [EventController::class, 'upComing']);
Route::get('events/passed', [EventController::class, 'passed']);
Route::get('banner', BannerController::class);
Route::get('devotionals', [DevotionalController::class, 'index']);
Route::get('devotionals/{testimony}', [DevotionalController::class, 'show']);

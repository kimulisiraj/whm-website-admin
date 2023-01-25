<?php

use App\Imports\LocationsImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/nova');
Route::get('/upload-locations', function () {
    Excel::import(new LocationsImport(), storage_path('app/locations.xlsx'));
});

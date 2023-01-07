<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(): Collection
    {
        return Location::all();
    }

    public function show(Location $location): Location
    {
        return $location->load('activities');
    }
}

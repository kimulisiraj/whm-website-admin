<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index(): Collection
    {
        return Location::query()
            ->orderBy(
                DB::raw('case 
	                        when pastors_level= "Moment Leaders" then 1 
	                        when pastors_level= "Network Leaders/Location Pastors" then 2 
	                        when pastors_level= "Network Leader/Location Pastor" then 3 
	                        when pastors_level= "Network Leader" then 4 
	                        when pastors_level= "Cluster Leaders/Location Pastors" then 5 
	                        when pastors_level= "Cluster Leader/Location Pastor" then 6 
	                        when pastors_level= "Cluster Leader" then 7 
	                        when pastors_level= "Location Pastors" then 8 
	                        when pastors_level= "Location Pastor" then 9 
                        end')
                )->get();
    }

    public function show(Location $location): Location
    {
        return $location->load('activities');
    }
}

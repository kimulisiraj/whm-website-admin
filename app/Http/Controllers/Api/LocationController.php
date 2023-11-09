<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index(Request $request): Collection
    {
        return Location::query()
            ->when(
                $request->search,
                function (Builder $query) use ($request) {
                    $query->where('location_name', 'LIKE', "%$request->search%")
                        ->orWhere('pastors_name', 'LIKE', "%$request->search%");
                }
            )
            ->orderBy('sort')
            ->orderBy(
                DB::raw('case
	                        when pastors_level= "Moment Leaders" then 1
	                        when pastors_level= "Network Leaders/Location Pastors" then 2
	                        when pastors_level= "Network Leader/Location Pastor" then 3
	                        when pastors_level= "Network Leaders" then 4
	                        when pastors_level= "Network Leader" then 5
	                        when pastors_level= "Cluster Leaders/Location Pastors" then 6
	                        when pastors_level= "Cluster Leader/Location Pastor" then 7
	                        when pastors_level= "Cluster Leaders" then 8
	                        when pastors_level= "Cluster Leader" then 9
	                        when pastors_level= "Location Pastors" then 10
	                        when pastors_level= "Location Pastor" then 11
                        end')
            )->get();
    }

    public function show(Location $location): Location
    {
        return $location->load('activities');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
            )->orderBy('sort')
            ->get()
            ->map([$this, 'groupDataByPastorLevel']);

    }

    public function show(Location $location): Location
    {
        return $location->load('activities');
    }

    public function groupDataByPastorLevel($item): array
    {

        $groupName = match (true) {
            str_starts_with($item->pastors_level, 'Location Pastor') => 'locations',
            str_starts_with($item->pastors_level, 'Cluster Leader') => 'clusters',
            str_starts_with($item->pastors_level, 'Network Leader') => 'networks',
            default => 'movement',
        };

        return [
            ...$item->toArray(),
            'group' => $groupName
        ];
    }
}

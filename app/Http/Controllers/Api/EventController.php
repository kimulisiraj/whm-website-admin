<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChurchEventResource;
use App\Models\ChurchEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{

    public function passed(): AnonymousResourceCollection
    {
        $events = ChurchEvent::query()
            ->passed()
            ->orderBy('starts_at')
            ->limit(8)
            ->get();

        return ChurchEventResource::collection($events);
    }

    public function live()
    {
        $event = ChurchEvent::query()->live()->latest('updated_at')->first();

        if (!$event) {
            return ['data'=> []];
        }

        return new ChurchEventResource($event);
    }

    public function upComing(Request $request): AnonymousResourceCollection
    {
        $events = ChurchEvent::query()
            ->UpComing()
            ->when($request->has('limit'), fn($query) => $query->limit($request->limit))
            ->orderBy('starts_at')
            ->get();

        return ChurchEventResource::collection($events);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChurchEventResource;
use App\Models\ChurchEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function passed()
    {
        $events = ChurchEvent::query()->passed()->latest('updated_at')->get();

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

    public function upComing()
    {
        $events = ChurchEvent::query()->UpComing()->latest('starts_at')->limit(2)->get();

        return ChurchEventResource::collection($events);
    }
}

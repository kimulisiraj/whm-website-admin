<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sermon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SermonController extends Controller
{
    public function __invoke(): Collection
    {
        return Sermon::query()->latest('updated_at')->limit(3)->get();
    }

}

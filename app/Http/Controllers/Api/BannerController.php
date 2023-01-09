<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;

class BannerController extends Controller
{
    public function __invoke()
    {
        return new BannerResource(Banner::latest('updated_at')->first());
    }
}

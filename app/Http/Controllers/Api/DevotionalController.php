<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Devotional;

class DevotionalController extends Controller
{
    public function index()
    {
        return Devotional::query()
            ->whereNotNull('published_at')
            ->select('id', 'slug', 'title', 'summary', 'published_at')
            ->latest('published_at')
            ->paginate(20);
    }

    public function show($devotional)
    {
       return Devotional::findBySlug($devotional);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Devotional extends Model
{
    use HasSlug;


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $casts = [
        'published_at' => 'date'
    ];

    protected $appends =[
        'published_human_date'
    ];


    protected $fillable = ['banner_image', 'title', 'body', 'slug', 'summary', 'author', 'published_at'];


    public function getPublishedHumanDateAttribute()
    {

       return $this->published_at
           ? $this->published_at->toFormattedDayDateString()
           : 'Not published';
    }

}

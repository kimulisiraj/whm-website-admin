<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Location extends Model
{
    use HasFactory;
    use HasSlug;


    protected $fillable = [
        'banner_image',
        'slug',
        'pastors_name',
        'pastors_image',
        'pastors_level',
        'location_name',
        'address',
        'description'
    ];

    protected $appends =[
        'image',
        'pastors_photo'
    ];

    public function getRouteKeyName():string
    {
        return 'slug';
    }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('location_name')
            ->saveSlugsTo('slug');
    }



    public function activities()
    {
        return $this->hasMany(LocationActivity::class);
    }

    public function getImageAttribute()
    {
        return asset('storage/'.$this->banner_image);
    }

    public function getPastorsPhotoAttribute()
    {
        return asset('storage/'.$this->pastors_image);
    }
}

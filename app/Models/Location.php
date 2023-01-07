<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_image',
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


    public function activities()
    {
        return $this->hasMany(LocationActivity::class);
    }

    public function getImageAttribute()
    {
        return asset($this->banner_image);
    }

    public function getPastorsPhotoAttribute()
    {
        return asset($this->pastors_image);
    }
}

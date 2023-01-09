<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'banner_image',
        'title',
        'description',
        'happened_at'
    ];

    protected $appends = [
        'image'
    ];

    protected $casts = [
        'happened_at' => 'datetime'
    ];

    public function getImageAttribute()
    {
        return asset('storage/'.$this->banner_image);
    }


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}

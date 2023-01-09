<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'banner_image',
        'tag',
        'phase',
        'starts_at',
        'ends_at',
        'link',
        'link_text',
    ];


    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
    ];

    public function getImageAttribute($value)
    {
        return asset($this->banner_image);
    }
}

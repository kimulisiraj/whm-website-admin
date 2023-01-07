<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimony extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['banner_image', 'title', 'body'];

    protected $appends = [
        'image'
    ];

    public function getImageAttribute()
    {
        return asset($this->banner_image);
    }
}

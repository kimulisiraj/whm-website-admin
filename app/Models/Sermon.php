<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sermon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'banner_image',
        'link',
        'title',
        'description'
    ];

    protected $appends =[
        'image'
    ];

    public function getImageAttribute()
    {
        return asset('storage/'.$this->banner_imate);
    }
}

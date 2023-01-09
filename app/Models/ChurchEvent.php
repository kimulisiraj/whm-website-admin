<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class ChurchEvent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'banner_image',
        'title',
        'description',
        'link',
        'link_text',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
    ];


    public function getImageAttribute()
    {
        return asset($this->banner_image);
    }

    public function getHappensAttribute()
    {
        if ($this->starts_at->day === $this->ends_at->day) {
            return $this->starts_at->format('h') . ' - ' . $this->ends_at->format('h A | D, d M');
        }
        if ($this->starts_at->month === $this->ends_at->month) {
            return $this->starts_at->format('h') . ' - ' . $this->ends_at->format('h A') . ' | ' . $this->starts_at->format('D d') . ' - ' . $this->ends_at->format('D d M');
        }
        return $this->starts_at->format('h') . ' - ' . $this->ends_at->format('h A') . ' | ' . $this->starts_at->format('D d M') . ' - ' . $this->ends_at->format('D d M');
    }

    public function scopePassed(Builder $query)
    {
        return $query->where('ends_at', '<', now());
    }

    public function scopeUpComing(Builder $query)
    {
        return $query->where('starts_at', '>', now());
    }

    public function scopeLive(Builder $query)
    {
        return $query
            ->where('starts_at', '<=', now())
            ->where('ends_at', '>=', now());
    }
}

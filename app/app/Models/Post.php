<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city()
    {
        return $this->hasOne(\App\Models\City::class, 'id', 'city_id')->withDefault();
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'post_tags');
    }

    public function scopeFullData($query)
    {
        return $query->with(['city', 'tags']);
    }

    public function scopeOnlyFavorite($query)
    {
        return $query->where('favorite', 1);
    }

    public function scopeByCity($query, $city_id )
    {
        $query ->where('city_id', $city_id)
            ->orWhereNull('city_id');
        return $query;
    }
}

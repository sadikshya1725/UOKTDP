<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Information extends Model
{
    use HasFactory;
    use Sluggable;


    public function get_contexts(): BelongsToMany
    {
        return $this->belongsToMany(Context::class, 'informations_contexts');
    }
    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
            ];
    }
}

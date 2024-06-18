<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Context extends Model
{
    use HasFactory;

    protected $table = 'contexts';

    public function get_informations(): BelongsToMany
    {
        return $this->belongsToMany(Information::class, 'informations_contexts');
    }
}

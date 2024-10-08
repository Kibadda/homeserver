<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'default',
    ];

    public function labels(): HasMany
    {
        return $this->hasMany(Label::class);
    }

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }
}

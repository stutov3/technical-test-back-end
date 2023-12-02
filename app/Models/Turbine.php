<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turbine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'farm_id', 'lat', 'lng'];

    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    public function components(): HasMany
    {
        return $this->hasMany(Component::class, 'turbine_id');
    }

    /*
     * will be implemented
     *
     * public function inspections()
    {
        return $this->hasMany(Inspection::class, 'turbine_id');
    }*/
}

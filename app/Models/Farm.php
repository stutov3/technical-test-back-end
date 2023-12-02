<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function turbine(): HasMany
    {
        return $this->hasMany(Turbine::class, 'farm_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ComponentType extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }
}

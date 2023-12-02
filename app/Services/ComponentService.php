<?php

namespace App\Services;

use App\Models\Component;
use Illuminate\Database\Eloquent\Collection;

class ComponentService
{
    public function getAllComponents(): Collection
    {
        return Component::all();
    }

    public function getComponentById($componentID): ?Component
    {
        return Component::find($componentID);
    }

    public function getComponentsByTurbineId(int $turbineID): Collection
    {
        return Component::where('turbine_id', $turbineID)->get();
    }

    public function getComponentByTurbineIdAndId(int $turbineID, int $componentID): ?Component
    {
        return Component::where('turbine_id', $turbineID)
            ->where('id', $componentID)
            ->first();
    }
}

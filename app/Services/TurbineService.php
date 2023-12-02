<?php

namespace App\Services;

use App\Models\Turbine;
use Illuminate\Database\Eloquent\Collection;

class TurbineService
{
    /**
     * Get all turbines.
     *
     * @return Collection
     */
    public function getAllTurbines(): Collection
    {
        return Turbine::all();
    }

    /**
     * Get turbine by ID.
     *
     * @param int $farmId
     * @param int $turbineId
     * @return Turbine|null
     */
    public function getTurbineById(int $turbineId): ?Turbine
    {
        return Turbine::find($turbineId);
    }

    /**
     * Get turbine by ID.
     *
     * @param int $farmId
     * @param int $turbineId
     * @return Turbine|null
     */
    public function getTurbineByFarmIdAndId(int $farmId, int $turbineId): ?Turbine
    {
        return Turbine::where('id', $turbineId)
            ->where('farm_id', $farmId)
            ->first();
    }

    public function getTurbinesForFarm(int $farmId): Collection
    {
        return Turbine::where('farm_id', $farmId)->get();
    }
}

<?php

namespace App\Services;

use App\Models\Farm;

class FarmService
{
    /**
     * Get all farms.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllFarms(): \Illuminate\Database\Eloquent\Collection
    {
        return Farm::all();
    }

    /**
     * Get farm by ID.
     *
     * @param int $farmId
     * @return \App\Models\Farm|null
     */
    public function getFarmById(int $farmId): ?Farm
    {
        return Farm::find($farmId);
    }
}
